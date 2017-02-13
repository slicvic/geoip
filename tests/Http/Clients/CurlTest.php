<?php

namespace Slicvic\Geoip\Test\Http\Clients;

use PHPUnit\Framework\TestCase;
use Slicvic\Geoip\Http\Clients\Curl;
use Slicvic\Geoip\Http\Response;

class CurlTest extends TestCase
{
    protected $curl;

    public function setUp()
    {
        $this->curl = new Curl();
    }

    public function testGetRespondsWith200()
    {
        $response = $this->curl->get('http://www.example.com/');
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertContains('This domain is established to be used for illustrative examples in documents.', $response->getBody());
    }

    public function testGetRespondsWith404()
    {
        $response = $this->curl->get('http://www.iana.org/omains');
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(404, $response->getStatusCode());
        $this->assertContains('This page does not exist', $response->getBody());
    }

    public function testGetWithInvalidUrl()
    {
        $response = $this->curl->get('http/www.example.com/');
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(0, $response->getStatusCode());
        $this->assertSame('', $response->getBody());
    }
}