<?php

namespace Slicvic\Geoip;

use Slicvic\Geoip\Locator\LocatorInterface;
use Slicvic\Geoip\Locator\ResponseInterface;
use Slicvic\Geoip\Exceptions\Exception;
use Slicvic\Geoip\Locator\IpInfo;

/**
 * @package Slicvic\Geoip
 */
class Geoip
{
    /**
     * The location service to use (e.g. IpInfo).
     *
     * @var LocatorInterface
     */
    protected $locator;

    /**
     * @param LocatorInterface|null $locator Defaults to IpInfo.
     */
    public function __construct(LocatorInterface $locator = null)
    {
        $this->locator = $locator ?: new IpInfo();
    }

    /**
     * Find location by IP address.
     *
     * @param  string $ip
     * @return ResponseInterface
     * @throws Exception
     */
    public function locate($ip)
    {
        $response = $this->locator->locate($ip);
        if ($response instanceof ResponseInterface) {
            return $response;
        } else {
            throw new Exception('Invalid location response, expected instance of \Slicvic\Geoip\Locator\ResponseInterface');
        }
    }

    /**
     * @return LocatorInterface
     */
    public function getLocator()
    {
        return $this->locator;
    }

    /**
     * @param LocatorInterface $locator
     */
    public function setLocator(LocatorInterface $locator)
    {
        $this->locator = $locator;
    }
}
