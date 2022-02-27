<?php

namespace App\Tests\Unit;

use App\Entity\Category;
use App\Entity\Post;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    private Category $category;
    protected function setUp(): void
    {
        parent::setUp();
        $this->category = new Category();
    }

    public function testGetTitle() : void
    {
        $title = 'Article I';

        $response = $this->category->setTitle($title);
        self::assertInstanceOf(Category::class, $response);
        self::assertEquals($title, $this->category->getTitle());
    }

    //Post
    public function testGetPost() : void
    {
        $post = new Post();

        $response = $this->category->setPost($post);
        self::assertInstanceOf(Category::class, $response);
        self::assertEquals($response->getPost(), $this->category->getPost());
    }
}
