<?php

namespace Anax\ipchecker;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller to check if IP is valid or not.
 */
class JsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     *
     * @var object $IpValidController uses for validating ip adress
     */
     private $IpValidController;

    public function initialize()
    {
        $this->IpValidController = new IpValidController();
    }

    public function indexAction()
    {

        $page = $this->di->get("page");
        $IpValidController = $this->IpValidController;
    }
    
    public function apiActionGet()
    {
        $request = $this->di->get("request");
        $json_adress = $this->di->request->getGet("json_adress");
        $valid = $this->IpValidController->IpValid($json_adress);
        $result = $this->IpValidController->validate_ip_Action($json_adress);
        $domain = $this->IpValidController->getDomain($json_adress);
        $data = [
            "json_adress" => $json_adress,
            "result" => $result,
            "domain" => $domain,
            "valid" => $valid
        ];
        return [$data];
    }
}
