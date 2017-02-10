<?php

namespace Slicvic\Geoip\Geolocation;

use Slicvic\Geoip\Contracts\Geolocation\ResponseInterface;
use Slicvic\Geoip\Contracts\Http\ResponseInterface as HttpResponseInterface;

/**
 * A geolocation response.
 *
 * @package Slicvic\Geoip\Geolocation
 */
class Response implements ResponseInterface
{
    /**
     * @var \Slicvic\Geoip\Contracts\Http\ResponseInterface
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
     * Constructor.
     *
     * @param string $ip
     * @param string $city
     * @param string $region
     * @param string $country
     * @param string $postal
     * @param string $latitude
     * @param string $longitude
     * @param HttpResponseInterface|null $httpResponse
     */
    public function __construct($ip, $city, $region, $country, $postal, $latitude, $longitude, HttpResponseInterface $httpResponse = null)
    {
        $this->ip = $ip;
        $this->city = $city;
        $this->region = $region;
        $this->country = $country;
        $this->postal = $postal;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
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
