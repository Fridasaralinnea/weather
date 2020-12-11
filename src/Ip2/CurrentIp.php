<?php

namespace Fla\Ip2;

/**
 * A class for getting user ip-address.
 */
class CurrentIp
{
    /**
     * @var string $ipaddress  holds user ipaddress.
     */
    private $ipaddress;

    /**
     * Constructor, getting current user ip.
     *
     * @return void.
     */
    public function __construct()
    {
        $this->ipaddress = $this->getIpAddress();
    }

    /**
     * Get current user ipaddress.
     *
     * @return void.
     */
    public function getIpAddress()
    {
        // $request = $this->di->get("request");
        // $server = $request->getServer();
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }
        return $ipaddress;
    }

    /**
     * return current user ipaddress.
     *
     * @return string for ipaddress.
     */
    public function getCurrentIpAddress()
    {
        return $this->ipaddress;
    }
}
