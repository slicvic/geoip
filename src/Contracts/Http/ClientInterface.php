<?php

namespace Slicvic\Geoip\Contracts\Http;

/**
 * Interface for HTTP clients.
 *
 * @package Slicvic\Geoip\Contracts\Http
 */
interface ClientInterface
{
    /**
     * Send HTTP GET request.
     *
     * @param  string $url
     * @param  array  $params
     * @return \Slicvic\Geoip\Contracts\Http\ResponseInterface
     */
    public static function get($url, array $params = []);

    /**
     * Send HTTP POST request.
     *
     * @param  string $url
     * @param  array  $params
     * @return \Slicvic\Geoip\Contracts\Http\ResponseInterface
     */
    public static function post($url, array $params = []);

    /**
     * Send HTTP PUT request.
     *
     * @param  string $url
     * @param  array  $params
     * @return \Slicvic\Geoip\Contracts\Http\ResponseInterface
     */
    public static function put($url, array $params = []);

    /**
     * Send HTTP DELETE request.
     *
     * @param  string $url
     * @return \Slicvic\Geoip\Contracts\Http\ResponseInterface
     */
    public static function delete($url);
}
