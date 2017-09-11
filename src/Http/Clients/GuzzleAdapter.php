<?php

namespace Slicvic\Geoip\Http\Clients;

use Slicvic\Geoip\Http\Response;
use Slicvic\Geoip\Exceptions\CurlErrorException;
use GuzzleHttp\Client as GuzzleHttpClient;

/**
 * Adapter for Guzzle HTTP client.
 *
 * @package Slicvic\Geoip\Http\Clients
 */
class GuzzleAdapter extends AbstractClient
{
    /**
     * @var GuzzleHttpClient
     */
    protected $httpClient;

    /**
     * Constructor.
     */
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
