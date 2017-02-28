<?php

namespace Slicvic\Geoip\Http\Clients;

use Slicvic\Geoip\Http\Response;
use Slicvic\Geoip\Exceptions\CurlErrorException;
use GuzzleHttp\Client as GuzzleHttpClient;

/**
 * An adapter for Guzzle HTTP client.
 *
 * @package Slicvic\Geoip\Http\Clients
 */
class GuzzleAdapter extends AbstractClient
{
    /**
     * @var GuzzleHttpClient
     */
    protected $client;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->client = new GuzzleHttpClient;
    }

    /**
     * {@inheritdoc}
     */
    public function get($url, array $params = [], array $headers = [])
    {
        $queryString = (count($params)) ? '?' . http_build_query($params) : '';
        $httpResponse = $this->client->request('GET', $url . $queryString);
        $geoResponse = new Response($httpResponse->getBody(), $httpResponse->getStatusCode(), $httpResponse->getHeaders());
        return $geoResponse;
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
