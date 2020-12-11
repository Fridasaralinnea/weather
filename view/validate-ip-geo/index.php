<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


?><h1>Validate Ip-address Geo</h1>

<form method="post">
    <label for="ipAddress">Enter ip-address:</label></br>
    <input type="text" name="ipAddress" value="<?= $userIp ?>">
    <input type="submit" name="validate" value="Validate ip-address">
</form>

<form method="get" action="<?= currentUrl() . "-JSON"?>">
    <label for="ipAddress">Enter ip-address:</label></br>
    <input type="text" name="ipAddress" value="<?= $userIp ?>">
    <input type="submit" name="validate" value="Validate ip-address JSON">
</form>

<h2>Test routes</h2>
<p>Test routes for ip-address: 194.47.150.9</p>

<form method="post">
    <input type="hidden" name="ipAddress" value="194.47.150.9">
    <input type="submit" value="Validate ip-address">
</form>

<form method="get" action="<?= currentUrl() . "-JSON"?>">
    <input type="hidden" name="ipAddress" value="194.47.150.9">
    <input type="submit" value="Validate ip-address JSON">
</form>
