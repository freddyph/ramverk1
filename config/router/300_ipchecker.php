<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IP-validator.",
            "mount" => "ipchecker",
            "handler" => "\Anax\ipchecker\IpCheckController",
        ],
        [
            "info" => "Ip Verifier to json.",
            "mount" => "ipjson",
            "handler" => "\Anax\ipchecker\JsonController",
        ],
    ]
];
