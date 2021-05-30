<?php

namespace Fla\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class CurlTest extends TestCase
{
    protected $curl;
    protected $url;

    /**
     * Set up.
     */
    protected function setUp()
    {
        $this->curl = new Curl();
        $this->url = "https://jsonplaceholder.typicode.com/todos/1";
    }

    /**
     * Test create new Curl.
     */
    public function testCreateCurl()
    {
        $this->assertInstanceOf("\Fla\Weather\Curl", $this->curl);
    }

    /**
     * test sum of values array.
     */
    public function testSum()
    {
        $res = $this->curl->getWithCurl($this->url);
        $exp = [
            "userId" => 1,
            "id" => 1,
            "title" => "delectus aut autem",
            "completed" => false
        ];

        $this->assertEquals($exp, $res);
    }
}
