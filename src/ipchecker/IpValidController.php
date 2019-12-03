<?php

namespace Anax\ipchecker;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller to check if IP is valid or not.
 */
class IpValidController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * @return bool
     */
    public function IpValid($ip_adress)
    {
        if (filter_var($ip_adress, FILTER_VALIDATE_IP)) {
            return "giltig ip-adress";
        }
        return "felaktig ip-adress";
    }

    /**
     *
     * @return string
     */
    public function validate_ip_Action($ip_adress) : string
    {
        if (filter_var($ip_adress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return "IPv6";
        } else if (filter_var($ip_adress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return "IPv4";
        }
        return "<b>{$ip_adress}</b> är en felaktig IP-adress.";
    }

    public function getDomain($ip_adress)
    {
        if (filter_var($ip_adress, FILTER_VALIDATE_IP)) {
            return gethostbyaddr($ip_adress);
        }
    }
}
