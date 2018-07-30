<?php

namespace Slicvic\Geoip\Http\Client;

use Slicvic\Geoip\Http\RestInterface;

/**
 * Abstract HTTP client.
 *
 * @package Slicvic\Geoip\Http\Client
 */
abstract class AbstractClient implements RestInterface 
{
    /**
     * {@inheritdoc}
     */
    public function get($url, array $params = [], array $headers = []) {}

    /**
     * {@inheritdoc}
     */
    public function post($url, array $params = [], array $headers = []) {}

    /**
     * {@inheritdoc}
     */
    public function put($url, array $params = [], array $headers = []) {}

    /**
     * {@inheritdoc}
     */
    public function delete($url, array $params = [], array $headers = []) {}
}
