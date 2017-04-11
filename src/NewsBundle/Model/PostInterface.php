<?php

namespace NewsBundle\Model;

interface PostInterface
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
     *
     * @return PostInterface
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
     *
     * @return PostInterface
     */
    public function setContent($content);

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent();

    /**
     * Set img.
     *
     * @param string $img
     *
     * @return PostInterface
     */
    public function setImg($img);

    /**
     * Get img.
     *
     * @return string
     */
    public function getImg();

    /**
     * Set nbComments.
     *
     * @param int $nbComments
     *
     * @return PostInterface
     */
    public function setNbComments($nbComments);

    /**
     * Get nbComments.
     *
     * @return int
     */
    public function getNbComments();

    /**
     * Set image.
     *
     * @param string $image
     *
     * @return PostInterface
     */
    public function setImage($image);

    /**
     * Get image.
     *
     * @return string
     */
    public function getImage();

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
     * @return PostInterface
     */
    public function setUser(UserInterface $user);

    /**
     * Get user.
     *
     * @return UserInterface
     */
    public function getUser();
}
