<?php

namespace Fla\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Fla\Weather\IpTrait;
use Fla\Weather\IpGeo;
use Fla\Weather\CurrentIp;

/**
 * A sample JSON controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 */
class WeatherJsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;
    use IpTrait;

    /**
     * @var string $db a sample member variable that gets initialised
     * @var object $currentIp class instance.
     * @var string $ip current user ipaddress.
     * @var object $ipGeo class instance.
     */
    private $db = "not active";
    private $currentIp;
    private $ipAddress;
    private $ipGeo;

    /**
     * The initialize method is optional and will always be called before the
     * target method/action. This is a convienient method where you could
     * setup internal properties that are commonly used by several methods.
     *
     * @return void
     */
    public function initialize() : void
    {
        // Use to initialise member variables.
        $this->db = "active";
        $this->currentIp = new CurrentIp();
        $this->ipGeo = new IpGeo();
        // $this->currentIp = $this->di->get("currentip");
        // $this->ipGeo = $this->di->get("ipgeo");
        $this->weather = $this->di->get("weather");
        $this->ipAddress = $this->currentIp->getCurrentIpAddress();
    }

    /**
     * This is the index method action, it handles:
     * GET METHOD mountpoint
     * GET METHOD mountpoint/
     * GET METHOD mountpoint/index
     *
     * @return array
     */
    public function indexActionGet() : array
    {
        $request = $this->di->get("request");

        $ipAddress = $request->getGet("ipAddress");
        $validate = $request->getGet("validate");

        $this->validateIp($ipAddress);
        $ipv4 = $this->isIPv4();
        $ipv6 = $this->isIPv6();
        $domain = $this->getDomain($ipAddress);
        $geotag = $this->ipGeo->getGeoTag($ipAddress);
        $lon = $geotag["longitude"];
        $lat = $geotag["latitude"];

        if ($validate == "Show past weather reports JSON") {
            $weather = $this->weather->getWeatherReport($lon, $lat);
        }
        if ($validate == "Show weather forecast JSON") {
            $weather = $this->weather->getWeatherForecast($lon, $lat);
        }

        $data = [
            "ipAddress" => $ipAddress ?? null,
            "ipv4" => $ipv4 ?? null,
            "ipv6" => $ipv6 ?? null,
            "domain" => $domain ?? null,
            "geotag" => $geotag ?? null,
            "validate" => $validate ?? null,
            "weather" => $weather ?? null
        ];

        return [$data];
    }

    /**
     * This sample method dumps the content of $di.
     * GET mountpoint/dump-app
     *
     * @return array
     */
    public function dumpDiActionGet() : array
    {
        // Deal with the action and return a response.
        $services = implode(", ", $this->di->getServices());
        $json = [
            "message" => __METHOD__ . "<p>\$di contains: $services",
            "di" => $this->di->getServices(),
        ];
        return [$json];
    }

    /**
     * Try to access a forbidden resource.
     * ANY mountpoint/forbidden
     *
     * @return array
     */
    public function forbiddenAction() : array
    {
        // Deal with the action and return a response.
        $json = [
            "message" => __METHOD__ . ", forbidden to access.",
        ];
        return [$json, 403];
    }
}
