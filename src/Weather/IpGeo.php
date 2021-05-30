<?php

namespace Fla\Weather;

use Fla\Weather\Curl;

/**
 * A class for getting user ip-address.
 */
class IpGeo
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
    private $baseUrlMap;

    /**
     * Constructor, getting current user ip.
     *
     * @return void.
     */
    public function __construct()
    {
        include(ANAX_INSTALL_PATH . '/config/vars.php');
        $this->apikey = $apiKeyIp;
        $this->baseUrl = "http://api.ipstack.com/";
        $this->baseUrlMap = "https://www.openstreetmap.org/";
        $this->curl = new Curl();
    }

    /**
     * Get current user ipaddress.
     *
     * @return void.
     */
    public function getGeoTag($ipAddress)
    {
        $url = $this->baseUrl . $ipAddress . "?access_key=" . $this->apikey;
        $res = $this->curl->getWithCurl($url);
        return $res;
    }
}
