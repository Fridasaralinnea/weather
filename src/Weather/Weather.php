<?php

namespace Fla\Weather;

use Fla\Weather\Curl;

/**
 * A class for getting user ip-address.
 */
class Weather
{
    /**
     * @var string $apikey.
     * @var string $baseUrl.
     * @var object $curl.
     * @var string $baseUrlMap.
     */
    private $apikey;
    private $baseUrl;
    private $curl;

    /**
     * Constructor, getting current user ip.
     *
     * @return void.
     */
    public function __construct()
    {
        $this->baseUrl = "https://api.openweathermap.org/data/2.5/onecall";
        $this->curl = new Curl();
    }

    public function setApiKey($key)
    {
        $this->apikey = $key;
    }

    /**
     * Get weather forecast.
     *
     * @return object.
     */
    public function getWeatherForecast($lon, $lat)
    {
        $url = $this->baseUrl . "?lat=" . $lat . "&lon=" . $lon . "&units=metric&appid=" . $this->apikey;
        $res = $this->curl->getWithCurl($url);
        return $res;
    }

    /**
     * Get weather report.
     *
     * @return object.
     */
    public function getWeatherReport($lon, $lat)
    {
        $dateArray = [];
        $time = time();
        for ($x = 0; $x <= 4; $x++) {
            array_push($dateArray, $time);
            $time -= 86400;
        }
        $url1 = $this->baseUrl . "/timemachine?lat=" . $lat . "&lon=" . $lon . "&dt=";
        $url2 = "&units=metric&appid=" . $this->apikey;
        $res = $this->curl->getWithMultiCurl($url1, $url2, $dateArray);

        return $res;
    }
}
