<?php

namespace Fla\Ip2;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class CurrentIpTest extends TestCase
{
    protected $currentIp;
    protected $ipAdr;

    /**
     * Set up.
     */
    protected function setUp()
    {
        $this->ipAdr = "194.47.150.9";
        $_SERVER["REMOTE_ADDR"] = $this->ipAdr;
        $this->currentIp = new CurrentIp();
    }

    /**
     * Test create new CurrentIp.
     */
    public function testCreateCurrentIp()
    {
        $this->assertInstanceOf("\Fla\Ip2\CurrentIp", $this->currentIp);
    }

    /**
     * Test get current ipaddress.
     */
    public function testGetCurrentIpAddress()
    {
        $res = $this->currentIp->getCurrentIpAddress();
        $exp = $this->ipAdr;

        $this->assertEquals($exp, $res);
    }

    /**
     * Test get ipaddress by REMOTE_ADDR.
     */
    public function testGetIpAddressRA()
    {
        $res = $this->currentIp->getIpAddress();
        $exp = $this->ipAdr;

        $this->assertEquals($exp, $res);
    }

    /**
     * Test get ipaddress by HTTP_X_FORWARDED_FOR.
     */
    public function testGetIpAddressHXFF()
    {
        $_SERVER["HTTP_X_FORWARDED_FOR"] = "194.47.150.9";
        $res = $this->currentIp->getIpAddress();
        $exp = $this->ipAdr;

        $this->assertEquals($exp, $res);
    }

    /**
     * Test get ipaddress by HTTP_CLIENT_IP.
     */
    public function testGetIpAddressHCP()
    {
        $_SERVER["HTTP_CLIENT_IP"] = "194.47.150.9";
        $res = $this->currentIp->getIpAddress();
        $exp = $this->ipAdr;

        $this->assertEquals($exp, $res);
    }
}
