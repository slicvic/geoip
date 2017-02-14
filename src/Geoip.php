<?php

namespace Slicvic\Geoip;

use Slicvic\Geoip\Contracts\Geolocation\LocatorInterface;
use Slicvic\Geoip\Contracts\Geolocation\ResponseInterface;
use Slicvic\Geoip\Exceptions\InvalidResponseException;
use Slicvic\Geoip\Geolocation\Clients\IpInfo;
use Slicvic\Geoip\Http\Clients\Curl;

/**
 * Class Geoip
 *
 * @package Slicvic\Geoip
 */
class Geoip
{
    /**
     * @var LocatorInterface
     */
    protected $locator;

    /**
     * Constructor.
     *
     * @param LocatorInterface|null $locator
     */
    public function __construct(LocatorInterface $locator = null)
    {
        $this->locator = ($locator) ?: new IpInfo(new Curl());
    }

    /**
     * Find location by IP address.
     *
     * @param  string $ip
     * @return ResponseInterface
     * @throws InvalidResponseException
     */
    public function locate($ip)
    {
        $response = $this->locator->locate($ip);
        if (!($response instanceof ResponseInterface)) {
            throw new InvalidResponseException('Invalid location response, expected instance of \Slicvic\Geoip\Contracts\Geolocation\ResponseInterface');
        }
        return $response;
    }

    /**
     * Get locator.
     *
     * @return LocatorInterface
     */
    public function getLocator()
    {
        return $this->locator;
    }

    /**
     * Set locator.
     *
     * @param LocatorInterface $locator
     */
    public function setLocator(LocatorInterface $locator)
    {
        $this->locator = $locator;
    }
}
