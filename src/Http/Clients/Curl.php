<?php

namespace Slicvic\Geoip\Http\Clients;

use Slicvic\Geoip\Http\Response;

/**
 * A cURL HTTP client.
 *
 * @package Slicvic\Geoip\Http\Clients
 */
class Curl extends AbstractClient
{
    /**
     * {@inheritdoc}
     */
    public function get($url, array $params = [], array $headers = [])
    {
        $queryString = (count($params)) ? '?' . http_build_query($params) : '';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url . $queryString);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        $body = curl_exec($curlHandle);
        $headers = curl_getinfo($curlHandle);
        curl_close($curlHandle);
        $response = new Response($body, $headers['http_code'], $headers);
        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, array $params = [], array $headers = [])
    {
        // TODO: Implement method.
    }

    /**
     * {@inheritdoc}
     */
    public function put($url, array $params = [], array $headers = [])
    {
        // TODO: Implement method.
    }

    /**
     * {@inheritdoc}
     */
    public function delete($url, array $params = [], array $headers = [])
    {
        // TODO: Implement method.
    }
}
