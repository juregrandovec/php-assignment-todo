<?php

namespace controllers;

class Controller
{
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        require 'vendor/autoload.php';
    }

    /**
     * @param string $filename
     * @param array|null $vars
     * @return false|string
     */
    function renderPhpFile(string $filename, array $vars = null)
    {
        if (is_array($vars) && !empty($vars)) {
            extract($vars);
        }
        ob_start();
        include $filename;
        return ob_get_clean();
    }

}