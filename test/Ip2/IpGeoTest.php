<?php

namespace Fla\Ip2;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class IpGeoTest extends TestCase
{
    protected $ipGeo;
    protected $ipAdr;

    /**
     * Set up.
     */
    protected function setUp()
    {
        $this->ipGeo = new IpGeo();
        $this->ipAdr = "194.47.150.9";
    }

    /**
     * Test create new IpGeo.
     */
    public function testCreateIpGeo()
    {
        $this->assertInstanceOf("\Fla\Ip2\IpGeo", $this->ipGeo);
    }

    // /**
    //  * Test get geotag.
    //  */
    // public function testGetGeoTag()
    // {
    //     $res =
    // }
}
