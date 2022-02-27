<?php

namespace App\Tests\Unit;

use App\Entity\Owner;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class OwnerTest extends TestCase
{
    private $faker;
    private Owner $owner;

    protected function setUp(): void
    {
        parent::setUp();
        $this->owner = new Owner();
        $this->faker = Factory::create();
    }

    public function testGetPhone() : void
    {
        $phoneNumber = $this->faker->phoneNumber;

        $response = $this->owner->setPhone($phoneNumber);
        self::assertInstanceOf(Owner::class, $response);
        self::assertEquals($phoneNumber, $this->owner->getPhone());
    }
}
