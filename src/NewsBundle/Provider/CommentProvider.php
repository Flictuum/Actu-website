<?php

namespace NewsBundle\Provider;

use NewsBundle\Model\CommentInterface;

class CommentProvider
{
    public function countUp(CommentInterface $comment)
    {
        $comment->getPost()->setNbComments($comment->getPost()->getNbComments() + 1);
    }

    public function countDown(CommentInterface $comment)
    {
        $comment->getPost()->setNbComments($comment->getPost()->getNbComments() - 1);
    }
}
