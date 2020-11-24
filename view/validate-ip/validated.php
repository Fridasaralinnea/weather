<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


?><h1>Validate Ip-address</h1>

<?php if ($IPv4) : ?>
    <p><?= $ipAddress ?> is a valid IPv4 IP address</p>
    <p>Hostname: <?= $domain ?></p>
<?php elseif ($IPv6) : ?>
    <p><?= $ipAddress ?> is a valid IPv6 IP address</p>
    <p>Hostname: <?= $domain ?></p>
<?php else : ?>
    <p><?= $ipAddress ?> is NOT a valid IPv4 or IPv6 IP address</p>
<?php endif; ?>
