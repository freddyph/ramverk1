<?php

namespace Anax\ipgeo;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller to check if IP is valid or not.
 */
class IpGeoValidController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    protected $api_key;

    public function __construct()
    {
        $api_keys = require ANAX_INSTALL_PATH . "/config/api_keys.php";
        $this->api_key = $api_keys["key1"];
    }

    public function cURLCall($ip_adress)
    {
        $json = [];
        // Initialize CURL:
        $ch = curl_init('http://api.ipstack.com/'. $ip_adress . '?access_key=' . $this->api_key . '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $api_result = json_decode($json, true);

        return $api_result;
    }

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
