<?php

namespace NewsBundle\Repository;

use Doctrine\ORM\EntityRepository;
use NewsBundle\Entity\Comment;
use NewsBundle\Model\CommentInterface;

class CommentRepository extends EntityRepository
{
    /**
     * @param CommentInterface $comment
     */
    public function save(CommentInterface $comment)
    {
        $this->getEntityManager()->persist($comment);
        $this->getEntityManager()->flush();
    }

    /**
     * @return CommentInterface
     */
    public function createComment()
    {
        return new Comment();
    }
}
