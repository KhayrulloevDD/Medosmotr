<?php

namespace App;

class preDispatch
{
    /**
     * @var $renderer
     */
    protected $renderer;

    /**
     * @var $db
     */
    protected $db;

    /**
     * preDispatch constructor.
     */
    public function __construct()
    {
        // initialize Twig
        $loader = new \Twig_Loader_Filesystem(ROOT . '/templates');
        $this->renderer = new \Twig_Environment($loader, array('debug'=> true));
        $this->renderer->addExtension(new \Twig_Extension_Debug());

        // Initialize Database connection
        $dbConfig = require (ROOT . '/config/database.php');

        // Create connection
//        $this->db = new \mysqli($dbConfig['host'], $dbConfig['user'], $dbConfig['password'], $dbConfig['dbname']);

        // Check db
//        if ($this->db->connect_error) {
//            die("Connection failed: " . $this->db->connect_error);
//        }
    }
}