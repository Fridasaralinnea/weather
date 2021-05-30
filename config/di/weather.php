<?php
/**
 *Weather service
 *Configuration file for DI container.
 */

return [

    // Services to add to the container.
    "services" => [
        "weather" => [
            "shared" => true,
            "callback" => function () {
                $weather = new \Fla\Weather\Weather();
                // $curl = new \Fla\Curl\Curl();
                // $weather->setCurl($curl);

                // Load the configuration files
                // $cfg = $this->get("configuration");
                // $config = $cfg->load("vars.php");
                // $settings = $config["config"] ?? null;
                //
                // if ($settings["$apiKeyWeather"] ?? null) {
                //     $weather->setApiKey($settings["$apiKeyWeather"]);
                // }

                include(ANAX_INSTALL_PATH . '/config/vars.php');
                $weather->setApiKey($apiKeyWeather);

                return $weather;
            }
        ],
    ],
];
