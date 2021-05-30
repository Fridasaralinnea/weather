<?php

namespace Fla\Weather;

use Fla\Curl\Curl;

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
        // include(ANAX_INSTALL_PATH . '/config/vars.php');
        // $this->apikey = $apiKeyIp;
        $this->baseUrl = "https://api.openweathermap.org/data/2.5/onecall";
        // "?lat={lat}&lon={lon}&exclude={part}&appid={API key}";
        // "/timemachine?lat={lat}&lon={lon}&dt={time}&appid={API key}";
        $this->curl = new Curl();
    }

    public function setApiKey($key)
    {
        $this->apikey = $key;
    }

    // public function setCurl($curl)
    // {
    //     $this->curl = $curl;
    // }

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
        // $bla = implode(",", $dateArray);
        // echo $bla;

        return $res;
    }
}
