<?php

namespace Slicvic\Geoip\Test\Http\Clients;

use PHPUnit\Framework\TestCase;
use Slicvic\Geoip\Contracts\Http\ResponseInterface;
use Slicvic\Geoip\Http\Clients\Curl;

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
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertContains('This domain is established to be used for illustrative examples in documents.', $response->getBody());
    }

    public function testGetRespondsWith404()
    {
        $response = $this->curl->get('http://www.iana.org/omains');
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(404, $response->getStatusCode());
        $this->assertContains('This page does not exist', $response->getBody());
    }

    /**
     * @expectedException \Slicvic\Geoip\Exceptions\CurlErrorException
     * @expectedExceptionCode 6
     * @expectedExceptionMessage Couldn't resolve host name
     */
    public function testGetThrowsCurlErrorException()
    {
        $this->curl->get('http/www.example.com/');
    }
}