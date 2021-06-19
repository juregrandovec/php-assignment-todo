<?php

namespace controllers;

use Doctrine\ORM\EntityManager;

class Controller
{
    /**
     * @var EntityManager
     */
    public $em;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        require 'bootstrap.php';
        $this->em = $entityManager;
    }

    /**
     * Renders a php file with set variables
     *
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