<?php

namespace Slicvic\Geoip\Contracts\Http;

/**
 * RESTful Interface for HTTP clients.
 *
 * @package Slicvic\Geoip\Contracts\Http
 */
interface RestInterface
{
    /**
     * Send HTTP GET request.
     *
     * @param  string $url
     * @param  array  $params
     * @param  array  $headers
     * @return \Slicvic\Geoip\Contracts\Http\ResponseInterface
     */
    public function get($url, array $params = [], array $headers = []);

    /**
     * Send HTTP POST request.
     *
     * @param  string $url
     * @param  array  $params
     * @param  array  $headers
     * @return \Slicvic\Geoip\Contracts\Http\ResponseInterface
     */
    public function post($url, array $params = [], array $headers = []);

    /**
     * Send HTTP PUT request.
     *
     * @param  string $url
     * @param  array  $params
     * @param  array  $headers
     * @return \Slicvic\Geoip\Contracts\Http\ResponseInterface
     */
    public function put($url, array $params = [], array $headers = []);

    /**
     * Send HTTP DELETE request.
     *
     * @param  string $url
     * @param  array  $params
     * @param  array  $headers
     * @return \Slicvic\Geoip\Contracts\Http\ResponseInterface
     */
    public function delete($url, array $params = [], array $headers = []);
}
