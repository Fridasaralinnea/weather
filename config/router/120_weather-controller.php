<?php
/**
 * Load the sample json controller.
 */
return [
    "routes" => [
        [
            "info" => "Weather Controller.",
            "mount" => "weather",
            "handler" => "\Fla\Weather\WeatherController",
        ],
    ]
];
