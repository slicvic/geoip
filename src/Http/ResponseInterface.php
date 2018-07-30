<?php

namespace Slicvic\Geoip\Http;

/**
 * HTTP response interface.
 *
 * @package Slicvic\Geoip\Http
 */
interface ResponseInterface
{
    /**
     * @return int
     */
    public function getStatusCode();

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @return string
     */
    public function getBody();
}
