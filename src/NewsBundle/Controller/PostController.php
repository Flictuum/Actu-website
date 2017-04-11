<?php

namespace NewsBundle\Controller;

use NewsBundle\Model\PostInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    public function homeAction()
    {
        if ($this->getUser()) {
            return $this->indexAction();
        }
        return $this->redirectToRoute('fos_user_security_login');
    }

    public function indexAction()
    {
        $posts = $this->get("news.post_repository")->findAll();

        return $this->render(':News:index.html.twig', [
            'listPosts' => $posts,
        ]);
    }

    public function viewAction(Request $request, $id)
    {
        $locale = $request->getLocale();

        $post = $this->get('news.post_repository')->find($id);

        if (!($post instanceof PostInterface)) {
            $exception = sprintf("Le post d'id: %d n'existe pas.", $id);
            throw new NotFoundHttpException($exception);
        }

        $comment = $this->get('news.comment_repository')->findBy(['post' => $post]);

        return $this->render('News/post_detail.html.twig', [
            'post' => $post,
            'comments' => $comment,
            'locale' => $locale
        ]);
    }

    public function menuAction(Request $request, $limit = 3)
    {
        $posts = $this->get('news.post_repository')->findPostByDate($limit);
        return $this->render(':News:pages_available.html.twig', ['listPosts' => $posts]);
    }

    public function addAction(Request $request)
    {
        $antispam = $this->container->get('news.antispam');
        $postRepository =  $this->get('news.post_repository');

        $post = $postRepository->createPost();
        $post->setUser($this->getUser());

        $form = $this->createForm('NewsBundle\Form\PostType', $post);
        $form-> handleRequest($request);

        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            if ($antispam->isSpam($post->getContent())) {
                throw new \Exception('Votre message a été détecté comme spam !');
            }

            $postRepository->save($post);

            return $this->redirectToRoute('live_view', ['id' => $post->getId()]);
        }

        return $this->render(':News:add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function editAction(Request $request, $id)
    {
        $postRepository = $this->get('news.post_repository');
        $post = $postRepository->find($id);

        if (!($post instanceof PostInterface)) {
            $exception = sprintf("Le post d'id: %d n'existe pas.", $id);
            throw new NotFoundHttpException($exception);
        }

        $form = $this->createForm('NewsBundle\Form\PostType', $post);
        $form->handleRequest($request);

        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            $postRepository->save($post);

            return $this->redirectToRoute('live_view', ['id' => $post->getId()]);
        }

        return $this->render('News/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    public function deleteAction(Request $request, $id)
    {
        $postRepository = $this->get('news.post_repository');
        $post = $postRepository->find($id);

        if (!($post instanceof PostInterface)) {
            $exception = sprintf("Le post d'id: %d n'existe pas.", $id);
            throw new NotFoundHttpException($exception);
        }

        $form = $this->createForm('Symfony\Component\Form\Extension\Core\Type\FormType');
        $form->handleRequest($request);

        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            $postRepository->delete($post);

            return $this->redirectToRoute('live_home');
        }

        return $this->render('News/delete.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }
}
