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
        $queryString = (count($params)) ? '?' . http_build_query($params) : '';
        $httpResponse = $this->httpClient->request('GET', $url . $queryString);
        $geoResponse = new Response($httpResponse->getBody(), $httpResponse->getStatusCode(), $httpResponse->getHeaders());
        return $geoResponse;
    }
}
