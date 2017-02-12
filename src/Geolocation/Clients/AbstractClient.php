<?php

namespace Slicvic\Geoip\Geolocation\Clients;

use Slicvic\Geoip\Contracts\Geolocation\LocatorInterface;
use Slicvic\Geoip\Contracts\Http\RestInterface;

/**
 * Abstract class for Geolocation clients.
 */
abstract class AbstractClient implements LocatorInterface
{
    /**
     * @var RestInterface
     */
    protected $httpClient;

    /**
     * Constructor.
     *
     * @param RestInterface $httpClient
     */
    public function __construct(RestInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Get HTTP client.
     *
     * @return RestInterface
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Set HTTP client.
     *
     * @param RestInterface $httpClient
     * @return $this
     */
    public function setHttpClient(RestInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }
}
