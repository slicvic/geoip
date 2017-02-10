<?php

namespace Slicvic\Geoip\Contracts\Http;

/**
 * Interface for HTTP responses.
 *
 * @package Slicvic\Geoip\Contracts\Http
 */
interface ResponseInterface
{
    /**
     * Get HTTP status code.
     *
     * @return int
     */
    public function getStatusCode();

    /**
     * Set HTTP status code.
     *
     * @param  int $code
     * @return $this
     */
    public function setStatusCode($code);

    /**
     * Get response headers.
     *
     * @return array
     */
    public function getHeaders();

    /**
     * Set response headers.
     *
     * @param  array $headers
     * @return $this
     */
    public function setHeaders(array $headers);

    /**
     * Get response body.
     *
     * @return string
     */
    public function getBody();

    /**
     * Set response body.
     *
     * @param  string $body
     * @return $this
     */
    public function setBody($body);
}
