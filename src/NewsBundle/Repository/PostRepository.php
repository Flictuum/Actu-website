<?php

namespace NewsBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;
use NewsBundle\Entity\Post;
use NewsBundle\Model\PostInterface;

class PostRepository extends EntityRepository
{
    public function __construct()
    {
    }

    /**
     * @param PostInterface $comment
     */
    public function save(PostInterface $comment)
    {
        $this->getEntityManager()->persist($comment);
        $this->getEntityManager()->flush();
    }

    /**
     * @param int $limit
     *
     * @return array
     */
    public function findPostByDate($limit = 3)
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.created', 'desc')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param PostInterface $post
     */
    public function delete(PostInterface $post)
    {
        $this->getEntityManager()->remove($post);
        $this->getEntityManager()->flush();
    }

    /**
     * @return PostInterface
     */
    public function createPost()
    {
        return new Post();
    }
}
