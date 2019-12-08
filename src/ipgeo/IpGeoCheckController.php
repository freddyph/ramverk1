<?php

namespace Anax\ipgeo;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller to check if IP is valid or not.
 */
class IpGeoCheckController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     *
     * @var object $IpGeoValidController uses for validating ip adress
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

        $title = "Validera IP";
        $userIP = file_get_contents("http://ipecho.net/plain");
        $ip_adress = [
            "userIP" => $userIP,
        ];
        // $page->add("ipgeo/validate", $ip_adress);
        $page->add("ipgeo/main", $ip_adress);
        return $page->render([
            "title" => $title,
        ]);
    }
    public function indexActionPost()
    {
        if ($this->di->request->getPost("ip_adress")) {
            $ip_adress = $this->di->request->getPost("ip_adress");
            $valid = $this->IpGeoValidController->IpValid($ip_adress);
            $result = $this->IpGeoValidController->validate_ip_Action($ip_adress);
            $geo = $this->IpGeoValidController->cURLCall($ip_adress);
            $data = [
                "ip_adress" => $ip_adress,
                "result" => $result,
                "lat" => $geo["latitude"],
                "long" => $geo["longitude"],
                "city" => $geo["city"],
                "country" => $geo["country_name"],
                "valid" => $valid
            ];
            $page = $this->di->get("page");
            $page->add("ipgeo/main");
            $page->add("ipgeo/validate", $data);
            return $page->render();
        } else {
            $json_adress = $this->di->request->getPost("json_adress");
            $response = $this->di->get("response");
            return $response->redirect("geojson/api?json_adress=$json_adress");
        }
    }
}
