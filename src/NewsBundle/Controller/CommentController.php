<?php

namespace NewsBundle\Controller;

use NewsBundle\NewsEvents;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller
{
    public function addCommentAction(Request $request, $id)
    {
        $comment = $this->get('news.comment_repository')->createComment();
        $comment->setPost($this->get('news.post_repository')->find($id));
        $comment->setUser($this->getUser());

        $form = $this->createForm('NewsBundle\Form\CommentType', $comment);

        $form->handleRequest($request);

        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            $this->get('event_dispatcher')->dispatch(NewsEvents::PRE_COMMENT_CREATION, new GenericEvent($comment));
            $this->get('news.comment_repository')->save($comment);

            return $this->redirectToRoute('live_view', ['id' => $comment->getPost()->getId()]);
        }

        return $this->render(':Comment:form.html.twig', [
            'form_comment' => $form->createView(),
            'id' => $id,
        ]);
    }
}
