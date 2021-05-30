<?php

namespace Fla\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class WeatherControllerTest extends TestCase
{

    // Create the di container.
    protected $di;
    protected $controller;



    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new WeatherController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    // $this->assertInstanceOf("\Anax\Response\Response", $res);
    //
    // $body = $res->getBody();
    // $exp = "| ramverk1</title>";
    // $this->assertContains($exp, $body);

    /**
     * Test the route "index" GET.
     */
    public function testIndexActionGet()
    {
        $res = $this->controller->indexActionGet();
        // $this->assertInternalType("array", $res);
        //
        // $json = $res[0];
        // $exp = "db is active";
        // $this->assertContains($exp, $json["message"]);
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }



    /**
     * Test the route "index" POST.
     */
    public function testIndexActionPost()
    {
        $res = $this->controller->indexActionPost();
        // $this->assertInternalType("array", $res);
        //
        // $json = $res[0];
        // $exp = "db is active";
        // $this->assertContains($exp, $json["message"]);
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }



    /**
     * Test the route "validated" GET.
     */
    public function testForecastActionGet()
    {
        $res = $this->controller->forecastActionGet();
        // $this->assertInternalType("array", $res);
        //
        // $json = $res[0];
        // $exp = "db is active";
        // $this->assertContains($exp, $json["message"]);
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }


    /**
     * Test the route "validated" GET.
     */
    public function testReportActionGet()
    {
        $res = $this->controller->reportActionGet();
        // $this->assertInternalType("array", $res);
        //
        // $json = $res[0];
        // $exp = "db is active";
        // $this->assertContains($exp, $json["message"]);
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }


    /**
     * Test the route "dump-di".
     */
    public function testDumpDiActionGet()
    {
        $res = $this->controller->dumpDiActionGet();
        $this->assertInternalType("array", $res);

        $json = $res[0];
        $exp = "di contains";
        $this->assertContains($exp, $json["message"]);
        $this->assertContains("configuration", $json["di"]);
        $this->assertContains("request", $json["di"]);
        $this->assertContains("response", $json["di"]);
    }



    /**
     * Test the route "forbidden".
     */
    public function testForbiddenAction()
    {
        $res = $this->controller->forbiddenAction();
        $this->assertInternalType("array", $res);

        $json = $res[0];
        $status = $res[1];

        $exp = "forbidden to access";
        $this->assertContains($exp, $json["message"]);
        $this->assertEquals(403, $status);
    }
}
