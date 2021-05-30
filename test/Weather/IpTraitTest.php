<?php

namespace Fla\Weather;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class IpTraitTest extends TestCase
{
    use IpTrait;

    /**
     * Test for validateIp.
     */
    public function testValidateIp()
    {
        $ipv4 = "194.47.150.9";
        $ipv6 = "2001:db8:3333:4444:5555:6666:7777:8888";
        $exp = true;

        $this->validateIp($ipv4);
        $res1 = $this->isIPv4();

        $this->validateIp($ipv6);
        $res2 = $this->isIPv6();

        $this->assertEquals($exp, $res1);
        $this->assertEquals($exp, $res2);
    }

    /**
     * Test get domain.
     */
    public function testGetDomain()
    {
        $ipv4 = "194.47.150.9";
        $ipv6 = "2001:db8:3333:4444:5555:6666:7777:8888";
        // $exp1 = "dbwebb.se";
        // $exp2 = "2001:db8:3333:4444:5555:6666:7777:8888";
        $exp1 = gethostbyaddr($ipv4);
        $exp2 = gethostbyaddr($ipv6);

        $res1 = $this->getDomain($ipv4);
        $res2 = $this->getDomain($ipv6);

        $this->assertEquals($exp1, $res1);
        $this->assertEquals($exp2, $res2);
    }
}
