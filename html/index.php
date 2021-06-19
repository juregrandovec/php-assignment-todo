<?php

use controllers\SiteController;
use models\GuzzleApiClient;

require 'bootstrap.php';

try {
    $siteController = new SiteController();
    $client = new GuzzleApiClient();
    echo($siteController->index($client));
} catch (Exception $e) {
    echo($e);
    die;
}
