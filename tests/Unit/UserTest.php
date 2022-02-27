<?php

namespace App\Tests\Unit;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Post;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }

    public function testGetEmail() : void
    {
        $email = 'test@test.fr';

        $response = $this->user->setEmail($email);
        $getEmail = $this->user->getEmail();
        self::assertInstanceOf(User::class, $response);
        self::assertEquals($email, $getEmail);
    }

    public function testGetRoles() : void
    {
        $role = ["ROLE_ADMIN"];

        $response = $this->user->setRoles($role);
        self::assertInstanceOf(User::class, $response);
        self::assertContains('ROLE_USER', $this->user->getRoles());
        self::assertContains('ROLE_ADMIN', $this->user->getRoles());
    }

    public function testGetPassword() : void
    {
        $password = 'test';

        $response = $this->user->setPassword($password);
        self::assertInstanceOf(User::class, $response);
        self::assertEquals($password, $this->user->getPassword());
    }

    //Post
    public function testGetPost() : void
    {
        $post = new Post();

        $response = $this->user->addPost($post);
        self::assertInstanceOf(User::class, $response);
        self::assertCount(1, $this->user->getPosts());
        self::assertTrue($this->user->getPosts()->contains($post));

        $response = $this->user->removePost($post);
        self::assertInstanceOf(User::class, $response);
        self::assertCount(0, $this->user->getPosts());
        self::assertFalse($this->user->getPosts()->contains($post));
    }
}
