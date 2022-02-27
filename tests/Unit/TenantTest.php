<?php

namespace App\Tests\Unit;

use App\Entity\Owner;
use App\Entity\Tenant;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class TenantTest extends TestCase
{
    private $faker;
    private Tenant $tenant;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tenant = new Tenant();
        $this->faker = Factory::create();
    }

    public function testGetPhone() : void
    {
        $phoneNumber = $this->faker->phoneNumber;

        $response = $this->tenant->setPhone($phoneNumber);
        self::assertInstanceOf(Tenant::class, $response);
        self::assertEquals($phoneNumber, $this->tenant->getPhone());
    }

    /*public function testGetValidated() : void
    {

        $response = $this->tenant->setValidated();
        //dump("res", $response);
        self::assertInstanceOf(Tenant::class, $response);
        self::assertTrue($response);
    }*/
}
