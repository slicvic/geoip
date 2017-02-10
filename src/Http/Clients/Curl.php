<?php

namespace Slicvic\Geoip\Http\Clients;

use Slicvic\Geoip\Http\Response;

/**
 * A cURL HTTP client.
 */
class Curl extends AbstractClient
{
    /**
     * {@inheritdoc}
     */
    public static function get($url, array $params = [], array $headers = [])
    {
        $queryString = (count($params)) ? '?' . http_build_query($params) : '';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . $queryString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $body = curl_exec($ch);
        $headers = curl_getinfo($ch);
        curl_close($ch);
        $response = new Response($body, $headers['http_code'], $headers);
        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public static function post($url, array $params = [], array $headers = [])
    {
        // Todo
    }

    /**
     * {@inheritdoc}
     */
    public static function put($url, array $params = [], array $headers = [])
    {
        // Todo
    }

    /**
     * {@inheritdoc}
     */
    public static function delete($url, array $params = [], array $headers = [])
    {
        // Todo
    }
}
