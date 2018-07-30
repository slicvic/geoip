<?php

namespace Slicvic\Geoip\Http;

use Slicvic\Geoip\Http\ResponseInterface;

/**
 * HTTP client response.
 *
 * @package Slicvic\Geoip\Http
 */
class Response implements ResponseInterface
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var string
     */
    protected $body;

    /**
     * @param string $body
     * @param int    $statusCode
     * @param array  $headers
     */
    public function __construct($body = '', $statusCode = 200, array $headers = [])
    {
        $this->body = (string) $body;
        $this->statusCode = (int) $statusCode;
        $this->headers = $headers;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return $this->body;
    }
}
