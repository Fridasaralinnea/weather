<?php
/**
 * Load the sample json controller.
 */
return [
    "routes" => [
        [
            "info" => "Weather JSON Controller.",
            "mount" => "weather-JSON",
            "handler" => "\Fla\Weather\WeatherJsonController",
        ],
    ]
];
