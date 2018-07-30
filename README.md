# GeoIP
A library to find the geographic location of an IP address, including the latitude, longitude, city, state, zip code, and country.

# Install
You can install the library using [composer](https://getcomposer.org/). Add these lines in your composer.json:

```json
{
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/slicvic/geoip.git"
        }
    ],
    "require": {
        "slicvic/geoip": "master"
    }
}
```

# How to use

```php
$geoip = new \Slicvic\Geoip\Geoip();

// @var \Slicvic\Geoip\Locator\ResponseInterface
$response = $geoip->locate('8.8.8.8');
```

### Read details about the given IP

```php
$city = $response->getCity();
$region = $response->getRegion();
$state = $response->getState();
$postal = $response->getPostal();
$country = $response->getCountry();
$latitude = $response->getLatitude();
$longitude = $response->getLongitude();
```
