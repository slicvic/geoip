<?php

namespace Slicvic\Geoip\Http\Client;

use Slicvic\Geoip\Http\Response;
use Slicvic\Geoip\Exceptions\CurlErrorException;

/**
 * cURL HTTP client.
 *
 * @package Slicvic\Geoip\Http\Client
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
        $curl = curl_init($url . $queryString);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $body = curl_exec($curl);
        $headers = curl_getinfo($curl);
        if ($curlErrno = curl_errno($curl)) {
            throw new CurlErrorException(curl_strerror($curlErrno), $curlErrno);
        }
        curl_close($curl);
        $response = new Response($body, $headers['http_code'], $headers);
        return $response;
    }
}
