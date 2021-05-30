<?php

namespace Fla\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class WeatherTest extends TestCase
{
    protected $weather;
    // protected $ipAdr;

    /**
     * Set up.
     */
    protected function setUp()
    {
        $this->weather = new Weather();
        // $this->ipAdr = "194.47.150.9";
    }

    /**
     * Test create new Weather.
     */
    public function testCreateWeather()
    {
        $this->assertInstanceOf("\Fla\Weather\Weather", $this->weather);
    }
}
