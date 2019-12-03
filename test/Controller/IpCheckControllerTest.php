<?php

namespace Anax\ipchecker;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpCheckControllerTest extends TestCase
{
    protected function setUp(): void
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new IpCheckController();
        $this->controller->setDI($this->di);
        // $this->controller->initialize();
    }

    public function testIndexAction()
    {
        $controller = new IpCheckController;
        $this->controller->setDI($this->di);
        $controller->initialize();
        $res = $controller->indexAction();
        $this->assertContains("ip_adress",$res);
    }
    /**
    * Test the route "index" with IPv4-address.
    */
   // public function testIpValid()
   // {
   //
   //     $this->di->get("request")->$request->setPost("ip_adress", "8.8.8.8");
   //     $this->controller->IpValid($ip_adress);
   //     $res = $this->controller->getMessage();
   //     $this->assertContains("giltig ip-adress", $res);
   // }
   // public function IpValid($ip_adress)
   // {
   //     if (filter_var($ip_adress, FILTER_VALIDATE_IP)) {
   //         return "giltig ip-adress";
   //     }
   //     return "felaktig ip-adress";
   // }

   // public function testIndexActionGet()
   //  {
   //      $request = $this->di->get("request");
   //      $request->setGet("title", "Validera en Ip-adress");
   //      $res = $this->controller->indexActionGet();
   //      $this->assertIsObject($res);
   //      $this->assertInstanceOf("\Anax\Response\Response", $res);
   //      $body = $res->getBody();
   //      $exp = "Validera en Ip-adress";
   //      $this->assertContains($exp, $body);
   //  }
    /**
     * Test the route "index".
     */
    // public function testIndexAction()
    // {
    //     $controller = new SampleController();
    //     $controller->initialize();
    //     $res = $controller->indexAction();
    //     $this->assertContains("db is active", $res);
    // }



    /**
     * Test the route "info".
     */
    // public function testInfoActionGet()
    // {
    //     $controller = new SampleController();
    //     $controller->initialize();
    //     $res = $controller->infoActionGet();
    //     $this->assertContains("db is active", $res);
    // }



    /**
     * Test the route "dump-di".
     */
    // public function testDumpDiActionGet()
    // {
    //     // Setup di
    //     $di = new DIFactoryConfig();
    //     $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
    //
    //     // Use a different cache dir for unit test
    //     $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");
    //
    //     // Setup the controller
    //     $controller = new SampleController();
    //     $controller->setDI($di);
    //     $controller->initialize();
    //
    //     // Do the test and assert it
    //     $res = $controller->dumpDiActionGet();
    //     $this->assertContains("di contains", $res);
    //     $this->assertContains("configuration", $res);
    //     $this->assertContains("request", $res);
    //     $this->assertContains("response", $res);
    // }
}
