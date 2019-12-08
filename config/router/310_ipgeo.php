<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IP-validator.",
            "mount" => "ipgeo",
            "handler" => "\Anax\ipgeo\IpGeoCheckController",
        ],
        [
            "info" => "Ip Verifier to json.",
            "mount" => "geojson",
            "handler" => "\Anax\ipgeo\GeoJsonController",
        ],
    ]
];
