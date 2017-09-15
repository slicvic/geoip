<?php

namespace Slicvic\Geoip\Contracts\Http;

/**
 * Interface for HTTP response.
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
     * Get response headers.
     *
     * @return array
     */
    public function getHeaders();

    /**
     * Get response body.
     *
     * @return string
     */
    public function getBody();
}
