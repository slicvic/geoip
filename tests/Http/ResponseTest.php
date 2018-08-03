<?php

namespace Slicvic\Geoip\Test\Http;

use PHPUnit\Framework\TestCase;
use Slicvic\Geoip\Http\Response;

class ResponseTest extends TestCase
{
    public function testDefaultConstructor()
    {
        $response = new Response();
        $this->assertSame('', $response->getBody());
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame([], $response->getHeaders());
    }

    public function testConstructorWithAllParams()
    {
        $headers = ['content_type' => 'text/html', 'api_key' => '1Uc5B32p^Fc3'];
        $response = new Response('He is indeed, the most interesting man in the world!', 404, $headers);
        $this->assertSame('He is indeed, the most interesting man in the world!', $response->getBody());
        $this->assertSame(404, $response->getStatusCode());
        $this->assertSame($headers, $response->getHeaders());
    }

    public function testConstructorWithOneParam()
    {
        $response = new Response('He can kill two stones with one bird');
        $this->assertSame('He can kill two stones with one bird', $response->getBody());
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame([], $response->getHeaders());
    }
}
