<?php

namespace Anax\ipgeo;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller to check if IP is valid or not.
 */
class GeoJsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     *
     * @var object $IpValidController uses for validating ip adress
     */
     private $IpGeoValidController;

    public function initialize()
    {
        $this->IpGeoValidController = new IpGeoValidController();
    }

    public function indexAction()
    {
        $page = $this->di->get("page");
        $IpGeoValidController = $this->IpGeoValidController;
    }

    public function apiActionGet()
    {
        $request = $this->di->get("request");
        $json_adress = $this->di->request->getGet("json_adress");
        $valid = $this->IpGeoValidController->IpValid($json_adress);
        $result = $this->IpGeoValidController->validate_ip_Action($json_adress);
        $domain = $this->IpGeoValidController->getDomain($json_adress);
        $geo = $this->IpGeoValidController->cURLCall($json_adress);
        $data = [
            "json_adress" => $json_adress,
            "result" => $result,
            "lat" => $geo["latitude"],
            "long" => $geo["longitude"],
            "city" => $geo["city"],
            "country" => $geo["country_name"],
            "valid" => $valid
        ];
        return [$data];
    }
}
