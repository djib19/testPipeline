<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Post;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    private Post $post;
    protected function setUp(): void
    {
        parent::setUp();
        $this->post = new Post();
    }

    public function testGetName() : void
    {
        $title = 'Article I';

        $response = $this->post->setTitle($title);
        self::assertInstanceOf(Post::class, $response);
        self::assertEquals($title, $this->post->getTitle());
    }

    public function testGetDescription() : void
    {
        $description = "Comment ...";

        $response = $this->post->setDescription($description);
        self::assertInstanceOf(Post::class, $response);
        self::assertEquals($description, $this->post->getDescription());
    }

    public function testGetUser() : void
    {
        $user = new User();

        $response = $this->post->setUser($user);
        self::assertInstanceOf(Post::class, $response);
        self::assertInstanceOf(User::class, $this->post->getUser());
    }

    public function testGetCreatedAt() : void
    {
        $createdAt = new \DateTime();

        $response = $this->post->setCreatedAt($createdAt);
        self::assertInstanceOf(Post::class, $response);
        self::assertEquals($createdAt, $this->post->getCreatedAt());
    }

    public function testGetUpdateAt() : void
    {
        $updatedAt = new \DateTime();

        $response = $this->post->setUpdatedAt($updatedAt);
        self::assertInstanceOf(Post::class, $response);
        self::assertEquals($updatedAt, $this->post->getUpdatedAt());
    }
}
