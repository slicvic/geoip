<?php

namespace Slicvic\Geoip\Locator;

use Slicvic\Geoip\Locator\ResponseInterface as GeoResponseInterface;
use Slicvic\Geoip\Http\ResponseInterface as HttpResponseInterface;

/**
 * Locator response.
 *
 * @package Slicvic\Geoip\Locator
 */
class Response implements GeoResponseInterface
{
    /**
     * @var HttpResponseInterface
     */
    protected $httpResponse;

    /**
     * @var string
     */
    protected $ip;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $postal;

    /**
     * @var string
     */
    protected $latitude;

    /**
     * @var string
     */
    protected $longitude;

    /**
     * @param HttpResponseInterface $httpResponse
     * @param string $ip
     * @param string $city
     * @param string $region
     * @param string $country
     * @param string $postal
     * @param string $latitude
     * @param string $longitude
     */
    public function __construct(HttpResponseInterface $httpResponse, $ip = '', $city = '', $region = '', $country = '', $postal = '', $latitude = '', $longitude = '')
    {
        $this->httpResponse = $httpResponse;
        $this->ip = (string) $ip;
        $this->city = (string) $city;
        $this->region = (string) $region;
        $this->country = (string) $country;
        $this->postal = (string) $postal;
        $this->latitude = (string) $latitude;
        $this->longitude = (string) $longitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

    /**
     * {@inheritdoc}
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * {@inheritdoc}
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * {@inheritdoc}
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * {@inheritdoc}
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * {@inheritdoc}
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
