<?php

namespace NewsBundle\Entity;

use NewsBundle\Model\CommentInterface;
use NewsBundle\Model\PostInterface;
use NewsBundle\Model\UserInterface;

/**
 * Comment.
 */
class Comment implements CommentInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $imageProfile;

    /**
     * @var \NewsBundle\Entity\User
     */
    private $user;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Comment
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set imageProfile.
     *
     * @param string $imageProfile
     *
     * @return Comment
     */
    public function setImageProfile($imageProfile)
    {
        $this->imageProfile = $imageProfile;

        return $this;
    }

    /**
     * Get imageProfile.
     *
     * @return string
     */
    public function getImageProfile()
    {
        return $this->imageProfile;
    }

    /**
     * @var \NewsBundle\Entity\Post
     */
    private $post;

    /**
     * Set post.
     *
     * @param PostInterface $post
     *
     * @return Comment
     */
    public function setPost(PostInterface $post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post.
     *
     * @return PostInterface
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set user.
     *
     * @param \NewsBundle\Model\UserInterface $user
     *
     * @return CommentInterface
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \NewsBundle\Model\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get updated.
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}
