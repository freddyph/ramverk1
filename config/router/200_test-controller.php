<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "TestController.",
            "mount" => "Controller",
            "handler" => "\Anax\Controller\TestController",
        ],
        // [
        //     "info" => "Ip Verifier to json.",
        //     "mount" => "ipjson",
        //     "handler" => "\Anax\Controller\IpValidJsonController",
        // ],
    ]
];
