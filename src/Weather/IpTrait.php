<?php

namespace Fla\Weather;

/**
 * A trait for validating ip-addresses.
 */
trait IpTrait
{
    /**
     * @var bool $validIPv4  Bool if Ip-address is IPv4 valid.
     * @var bool $validIPv6  Bool if Ip-address is IPv6 valid.
     */
    private $validIPv4 = false;
    private $validIPv6 = false;

    /**
     * Validate ip-address for IPv4 and IPv6.
     *
     * @return void.
     */
    public function validateIp($ipAdr)
    {
        if (filter_var($ipAdr, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $this->validIPv4 = true;
        } elseif (filter_var($ipAdr, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $this->validIPv6 = true;
        } else {
            $this->validIPv4 = false;
            $this->validIPv6 = false;
        }
    }

    /**
     * Get validIPv4.
     *
     * @return bool for validIPv4.
     */
    public function isIPv4()
    {
        return $this->validIPv4;
    }

    /**
     * Get validIPv6.
     *
     * @return bool for validIPv6.
     */
    public function isIPv6()
    {
        return $this->validIPv6;
    }

    /**
     * Get Domain for ip-address.
     *
     * @return string for domain.
     */
    public function getDomain($ipAddress)
    {
        $this->validateIp($ipAddress);
        $domain = "";
        if ($this->validIPv4) {
            $domain = gethostbyaddr($ipAddress);
        }
        if ($this->validIPv6) {
            $domain = gethostbyaddr($ipAddress);
        }
        return $domain;
    }
}
