<?php

namespace Slicvic\Geoip\Contracts;

/**
 * Interface for HTTP clients.
 *
 * @package Slicvic\Geoip\Contracts
 */
interface HttpClientInterface
{
    /**
     * Send HTTP GET request.
     *
     * @param  string $url
     * @param  array  $params
     * @return \Slicvic\Geoip\Http\Response
     */
    public function get($url, array $params = []);

    /**
     * Send HTTP POST request.
     *
     * @param  string $url
     * @param  array  $params
     * @return \Slicvic\Geoip\Http\Response
     */
    public function post($url, array $params = []);

    /**
     * Send HTTP PUT request.
     *
     * @param  string $url
     * @param  array  $params
     * @return \Slicvic\Geoip\Http\Response
     */
    public function put($url, array $params = []);

    /**
     * Send HTTP DELETE request.
     *
     * @param  string $url
     * @return \Slicvic\Geoip\Http\Response
     */
    public function delete($url);
}
