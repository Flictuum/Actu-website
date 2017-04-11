<?php

namespace NewsBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use NewsBundle\Model\UserInterface;

/**
 * User
 */
class User extends BaseUser implements UserInterface
{

    /**
     * @var int
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
