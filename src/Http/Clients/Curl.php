<?php

namespace Slicvic\Geoip\Http\Clients;

use Slicvic\Geoip\Http\Response;
use Slicvic\Geoip\Exceptions\CurlErrorException;

/**
 * cURL HTTP client.
 *
 * @package Slicvic\Geoip\Http\Clients
 */
class Curl extends AbstractClient
{
    /**
     * {@inheritdoc}
     *
     * @throws CurlErrorException
     */
    public function get($url, array $params = [], array $headers = [])
    {
        $queryString = (count($params)) ? '?' . http_build_query($params) : '';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url . $queryString);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        $body = curl_exec($curlHandle);
        $headers = curl_getinfo($curlHandle);
        if ($curlErrno = curl_errno($curlHandle)) {
            throw new CurlErrorException(curl_strerror($curlErrno), $curlErrno);
        }
        curl_close($curlHandle);
        $response = new Response($body, $headers['http_code'], $headers);
        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, array $params = [], array $headers = [])
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public function put($url, array $params = [], array $headers = [])
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public function delete($url, array $params = [], array $headers = [])
    {
        //
    }
}
