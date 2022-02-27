<?php

namespace App\Tests\Func;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

abstract class EndPoint extends WebTestCase
{
    private array $config = ['ACCEPT'=>'application/json', 'CONTENT_TYPE'=>'application/json'];

    public function getQuery(string $method, string $uri, array $data = []): Response
    {
        $client = self::createClient();
        $client->request(
            $method,
            $uri. '.json',
            $data,
            [],
            $this->config
        );
        return $client->getResponse();
    }
}