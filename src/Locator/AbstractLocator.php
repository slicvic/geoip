<?php

namespace Slicvic\Geoip\Locator;

use Slicvic\Geoip\Locator\LocatorInterface;
use Slicvic\Geoip\Http\RestInterface;
use Slicvic\Geoip\Http\Client\Curl;

/**
 * Abstract locator.
 */
abstract class AbstractLocator implements LocatorInterface
{
    /**
     * @var RestInterface
     */
    protected $httpClient;

    /**
     * @param RestInterface $httpClient
     */
    public function __construct(RestInterface $httpClient = null)
    {
        $this->httpClient = $httpClient ?: new Curl();
    }

    /**
     * @return RestInterface
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param RestInterface $httpClient
     * @return $this
     */
    public function setHttpClient(RestInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }
}
