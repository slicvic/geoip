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
        $this->statusCode = 404;
        $this->body = '<!doctype html><html><head><title></title></head><body></body></html>';
        $this->headers = [
            'content_type' => 'text/html'
        ];
    }

    public function testConstructor()
    {
        $response = new Response($this->body, $this->statusCode, $this->headers);
        $this->assertSame($this->statusCode, $response->getStatusCode());
        $this->assertSame($this->body, $response->getBody());
        $this->assertSame($this->headers, $response->getHeaders());
    }

    public function testSetters()
    {
        $response = new Response();
        $response->setStatusCode($this->statusCode);
        $response->setBody($this->body);
        $response->setHeaders($this->headers);
        $this->assertSame($this->statusCode, $response->getStatusCode());
        $this->assertSame($this->body, $response->getBody());
        $this->assertSame($this->headers, $response->getHeaders());
    }

    public function testSettersChaining()
    {
        $response = (new Response())
            ->setStatusCode($this->statusCode)
            ->setBody($this->body)
            ->setHeaders($this->headers);
        $this->assertSame($this->statusCode, $response->getStatusCode());
        $this->assertSame($this->body, $response->getBody());
        $this->assertSame($this->headers, $response->getHeaders());
    }
}
