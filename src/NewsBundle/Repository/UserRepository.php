<?php

namespace NewsBundle\Repository;

use Doctrine\ORM\EntityRepository;
use NewsBundle\Model\UserInterface;

class UserRepository extends EntityRepository
{
    /**
     * @param UserInterface $user
     * @internal param UserInterface $comment
     */
    public function save(UserInterface $user)
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }
}
