<?php

namespace Slicvic\Geoip\Geolocation;

use Slicvic\Geoip\Contracts\Geolocation\ResponseInterface as GeoResponseInterface;
use Slicvic\Geoip\Contracts\Http\ResponseInterface as HttpResponseInterface;

/**
 * A Geolocation response.
 *
 * @package Slicvic\Geoip\Geolocation
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
     * Constructor.
     *
     * @param HttpResponseInterface $httpResponse
     * @param string $ip
     * @param string $city
     * @param string $region
     * @param string $country
     * @param string $postal
     * @param string $latitude
     * @param string $longitude
     */
    public function __construct(HttpResponseInterface $httpResponse, $ip = null, $city = null, $region = null, $country = null, $postal = null, $latitude = null, $longitude = null)
    {
        $this->httpResponse = $httpResponse;
        $this->ip = $ip;
        $this->city = $city;
        $this->region = $region;
        $this->country = $country;
        $this->postal = $postal;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * Factory.
     *
     * @param HttpResponseInterface $httpResponse
     * @param string $ip
     * @param string $city
     * @param string $region
     * @param string $country
     * @param string $postal
     * @param string $latitude
     * @param string $longitude
     * @return Response
     */
    public static function create(HttpResponseInterface $httpResponse, $ip = null, $city = null, $region = null, $country = null, $postal = null, $latitude = null, $longitude = null)
    {
        return (new static($httpResponse, $ip, $city, $region, $country, $postal, $latitude, $longitude));
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
