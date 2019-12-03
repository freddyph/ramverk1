<?php

namespace Anax\ipchecker;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller to check if IP is valid or not.
 */
class IpCheckController implements ContainerInjectableInterface
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
        $page->add("ipchecker/main");
        return $page->render();
    }
    public function indexActionPost()
    {
        if ($this->di->request->getPost("ip_adress")) {
            $ip_adress = $this->di->request->getPost("ip_adress");
            $valid = $this->IpValidController->IpValid($ip_adress);
            $result = $this->IpValidController->validate_ip_Action($ip_adress);
            $domain = $this->IpValidController->getDomain($ip_adress);
            $data = [
                "ip_adress" => $ip_adress,
                "result" => $result,
                "domain" => $domain,
                "valid" => $valid
            ];
            $page = $this->di->get("page");
            $page->add("ipchecker/main");
            $page->add("ipchecker/validate", $data);
            return $page->render();
        } else {
            $json_adress = $this->di->request->getPost("json_adress");
            $response = $this->di->get("response");
            return $response->redirect("ipjson/api?json_adress=$json_adress");
        }
    }
}
