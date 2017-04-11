<?php

namespace NewsBundle\Model;

interface CommentInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set title.
     *
     * @param string $title
     */
    public function setTitle($title);

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set content.
     *
     * @param string $content
     */
    public function setContent($content);

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent();

    /**
     * Set imageProfile.
     *
     * @param string $imageProfile
     */
    public function setImageProfile($imageProfile);

    /**
     * Get imageProfile.
     *
     * @return string
     */
    public function getImageProfile();

    /**
     * Set post.
     *
     * @param PostInterface $post
     */
    public function setPost(PostInterface $post);

    /**
     * Get post.
     *
     * @return \NewsBundle\Entity\Post
     */
    public function getPost();

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated();

    /**
     * Get updated.
     *
     * @return \DateTime
     */
    public function getUpdated();

    /**
     * Set user.
     *
     * @param UserInterface $user
     *
     * @return CommentInterface
     */
    public function setUser(UserInterface $user);

    /**
     * Get user.
     *
     * @return UserInterface
     */
    public function getUser();
}
