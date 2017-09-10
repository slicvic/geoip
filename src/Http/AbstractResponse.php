<?php

namespace Slicvic\Geoip\Http;

use Slicvic\Geoip\Contracts\Http\ResponseInterface;

/**
 * Base class for HTTP responses.
 *
 * @package Slicvic\Geoip\Http
 */
abstract class AbstractResponse implements ResponseInterface
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
     * Constructor.
     *
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
