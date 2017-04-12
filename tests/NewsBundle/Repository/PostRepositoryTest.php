<?php

namespace NewsBundle\Repository;

use NewsBundle\Model\PostInterface;
use PHPUnit\Framework\TestCase;

class PostRepositoryTest extends TestCase
{
    private $postRepository;
    private $post;

    public function setUp()
    {
        $this->post = $this->createMock(PostInterface::class);
        $this->postRepository = new PostRepository();
    }

    public function tearDown()
    {
    }

    public function testFindPostByDateShouldReturnLimitedArrayOfPost()
    {

    }
}
