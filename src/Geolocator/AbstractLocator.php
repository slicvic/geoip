<?php

namespace Slicvic\Geoip\Geolocator;

use Slicvic\Geoip\Contracts\Geolocator\LocatorInterface;
use Slicvic\Geoip\Contracts\Http\RestInterface;

/**
 * Base class for geolocation services.
 */
abstract class AbstractLocator implements LocatorInterface
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
