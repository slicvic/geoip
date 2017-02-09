<?php

namespace Slicvic\Geoip\Test\Unit\Http;

use PHPUnit\Framework\TestCase;
use Slicvic\Geoip\Http\Response;

class ResponseTest extends TestCase
{
    protected $statusCode;
    protected $body;
    protected $headers;

    public function setUp()
    {
        $this->statusCode = 200;
        $this->body = '<html><head><title></title></head><body></body></html>';
        $this->headers = [
            'content_type' => 'text/html'
        ];
    }

    public function testConstructor()
    {
        $response = new Response($this->statusCode, $this->body, $this->headers);
        $this->assertSame($response->getStatusCode(), $this->statusCode);
        $this->assertSame($response->getBody(), $this->body);
        $this->assertSame($response->getHeaders(), $this->headers);
    }

    public function testSetters()
    {
        $response = new Response();
        $response->setStatusCode($this->statusCode);
        $response->setBody($this->body);
        $response->setHeaders($this->headers);
        $this->assertSame($response->getStatusCode(), $this->statusCode);
        $this->assertSame($response->getBody(), $this->body);
        $this->assertSame($response->getHeaders(), $this->headers);
    }

    public function testSettersChaining()
    {
        $response = (new Response())
            ->setStatusCode($this->statusCode)
            ->setBody($this->body)
            ->setHeaders($this->headers);
        $this->assertSame($response->getStatusCode(), $this->statusCode);
        $this->assertSame($response->getBody(), $this->body);
        $this->assertSame($response->getHeaders(), $this->headers);
    }
}
