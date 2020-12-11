<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?><h1>Validate Ip-address Geo</h1>

<?php if ($ipv4) : ?>
    <p><?= $ipAddress ?> is a valid IPv4 IP address</p>
    <p>Hostname: <?= $domain ?></p>
    <p>Position: <?= $geotag["city"] ?>, <?= $geotag["country_name"] ?></p>
    <p>Coordinates: <?= $geotag["latitude"] ?>, <?= $geotag["longitude"] ?></p>
<?php elseif ($ipv6) : ?>
    <p><?= $ipAddress ?> is a valid IPv6 IP address</p>
    <p>Hostname: <?= $domain ?></p>
    <p>Position: <?= $geotag["city"] ?>, <?= $geotag["country_name"] ?></p>
    <p>Coordinates: <?= $geotag["latitude"] ?>, <?= $geotag["longitude"] ?></p>
<?php else : ?>
    <img><?= $ipAddress ?> is NOT a valid IPv4 or IPv6 IP address</img>
<?php endif; ?>
