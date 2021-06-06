<?php

use controllers\SiteController;

require 'vendor/autoload.php';

//TODO REMOVE
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


try {
    $siteController = new SiteController();
    echo($siteController->index());
} catch (Exception $e) {
    echo($e);
    die;
}
