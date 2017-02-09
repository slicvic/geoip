<?php

namespace Slicvic\Geoip\Http;

use Slicvic\Geoip\Contracts\Http\ResponseInterface;

/**
 * Abstract base class for HTTP responses.
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
     * @param int    $statusCode
     * @param string $body
     * @param array  $headers
     */
    public function __construct($statusCode = 200, $body = '', array $headers = [])
    {
        $this->statusCode = (int) $statusCode;
        $this->headers = $headers;
        $this->body = $body;
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
    public function setStatusCode($code)
    {
        $this->statusCode = (int) $code;
        return $this;
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
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * {@inheritdoc}
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }
}
