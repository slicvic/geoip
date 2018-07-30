<?php

namespace Slicvic\Geoip\Http\Client;

use Slicvic\Geoip\Http\Response;
use Slicvic\Geoip\Exceptions\CurlErrorException;
use GuzzleHttp\Client as GuzzleHttpClient;

/**
 * Guzzle HTTP client adapter.
 *
 * @package Slicvic\Geoip\Http\Client
 */
class GuzzleAdapter extends AbstractClient
{
    /**
     * @var GuzzleHttpClient
     */
    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new GuzzleHttpClient();
    }

    /**
     * {@inheritdoc}
     */
    public function get($url, array $params = [], array $headers = [])
    {
        $queryString = count($params) ? '?' . http_build_query($params) : '';
        $guzzleResponse = $this->httpClient->request('GET', $url . $queryString);
        $response = new Response($guzzleResponse->getBody(), $guzzleResponse->getStatusCode(), $guzzleResponse->getHeaders());
        return $response;
    }
}
