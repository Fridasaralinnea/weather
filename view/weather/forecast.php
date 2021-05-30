<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?><h1>Weather Forecast</h1>

<?php if ($ipv4) : ?>
    <p><?= $ipAddress ?> is a valid IPv4 IP address</p>
<?php elseif ($ipv6) : ?>
    <p><?= $ipAddress ?> is a valid IPv6 IP address</p>
<?php else : ?>
    <img><?= $ipAddress ?> is NOT a valid IPv4 or IPv6 IP address</img>
<?php endif; ?>

<p>Hostname: <?= $domain ?></p>
<p>Position: <?= $geotag["city"] ?>, <?= $geotag["country_name"] ?></p>
<p>Coordinates: <?= $geotag["latitude"] ?>, <?= $geotag["longitude"] ?></p>

<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css">
<script src='https://unpkg.com/leaflet@1.3.3/dist/leaflet.js'></script>
<div id="map"></div>
<style>
    #map{ height: 300px }
</style>
<script type="text/javascript">
    let lat=<?php echo $geotag["latitude"]; ?>;
    let long=<?php echo $geotag["longitude"]; ?>;
    let map = L.map('map', {
        center: [lat, long],
        zoom: 12
    });
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, long]).addTo(map)
</script>

<?php if (isset($weather["cod"])) : ?>
    <p>No location data or weather data found for IP address</p>
<?php else : ?>
    <table>
        <tr>
            <th>Day</th>
            <th>Temperature C</th>
            <th>Feels like C</th>
            <th>Weather</th>
        </tr>
        <tr>
            <td>Today</td>
            <td><?= $current["temp"]?> C</td>
            <td><?= $current["feels_like"] ?> C</td>
            <td><?= $current["weather"][0]["description"]?></td>
        </tr>
        <tr>
            <td>Tomorrow</td>
            <td><?= $weather["daily"][1]["temp"]["day"] ?> C</td>
            <td><?= $weather["daily"][1]["feels_like"]["day"] ?> C</td>
            <td><?= $weather["daily"][1]["weather"][0]["description"]?></td>
        </tr>
        <tr>
            <td><?= date("Y-m-d", $weather["daily"][2]["dt"])?></td>
            <td><?= $weather["daily"][2]["temp"]["day"]?> C</td>
            <td><?= $weather["daily"][2]["feels_like"]["day"] ?> C</td>
            <td><?= $weather["daily"][2]["weather"][0]["description"]?></td>
        </tr>
        <tr>
            <td><?= date("Y-m-d", $weather["daily"][3]["dt"])?></td>
            <td><?= $weather["daily"][3]["temp"]["day"]?> C</td>
            <td><?= $weather["daily"][3]["feels_like"]["day"] ?> C</td>
            <td><?= $weather["daily"][3]["weather"][0]["description"]?></td>
        </tr>
        <tr>
            <td><?= date("Y-m-d", $weather["daily"][4]["dt"])?></td>
            <td><?= $weather["daily"][4]["temp"]["day"]?> C</td>
            <td><?= $weather["daily"][4]["feels_like"]["day"] ?> C</td>
            <td><?= $weather["daily"][4]["weather"][0]["description"]?></td>
        </tr>
        <tr>
            <td><?= date("Y-m-d", $weather["daily"][5]["dt"])?></td>
            <td><?= $weather["daily"][5]["temp"]["day"]?> C</td>
            <td><?= $weather["daily"][5]["feels_like"]["day"] ?> C</td>
            <td><?= $weather["daily"][5]["weather"][0]["description"]?></td>
        </tr>
        <tr>
            <td><?= date("Y-m-d", $weather["daily"][6]["dt"])?></td>
            <td><?= $weather["daily"][6]["temp"]["day"]?> C</td>
            <td><?= $weather["daily"][6]["feels_like"]["day"] ?> C</td>
            <td><?= $weather["daily"][6]["weather"][0]["description"]?></td>
        </tr>
    </table>
<?php endif; ?>
