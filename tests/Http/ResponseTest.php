<?php

namespace Slicvic\Geoip\Test\Http;

use PHPUnit\Framework\TestCase;
use Slicvic\Geoip\Http\Response;

class ResponseTest extends TestCase
{
    public function testConstructor()
    {
        // Test with default parameters
        $response = new Response();
        $this->assertSame('', $response->getBody());
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame([], $response->getHeaders());

        // Test with default status and headers
        $response = new Response('He can kill two stones with one bird');
        $this->assertSame('He can kill two stones with one bird', $response->getBody());
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame([], $response->getHeaders());

        // Test with default headers and check that status is cast to integer
        $response = new Response('He can speak Russian… in French', "301");
        $this->assertSame('He can speak Russian… in French', $response->getBody());
        $this->assertSame(301, $response->getStatusCode());
        $this->assertSame([], $response->getHeaders());

        // Test with actual headers
        $headers = ['content_type' => 'text/html', 'api_key' => '1Uc5B32p^Fc3'];
        $response = new Response('He is indeed, the most interesting man in the world!', 404, $headers);
        $this->assertSame('He is indeed, the most interesting man in the world!', $response->getBody());
        $this->assertSame(404, $response->getStatusCode());
        $this->assertSame($headers, $response->getHeaders());
    }
}
