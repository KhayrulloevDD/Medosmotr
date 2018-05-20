<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;

class preDispatch
{
    /**
     * @var $renderer
     */
    protected $renderer;

    /**
     * @var $request
     */
    protected $request;

    /**
     * preDispatch constructor.
     */
    public function __construct()
    {
        // initialize Twig
        $loader = new \Twig_Loader_Filesystem(ROOT . '/templates');
        $this->renderer = new \Twig_Environment($loader, array('debug'=> true));
        $this->renderer->addExtension(new \Twig_Extension_Debug());

        $this->request = Request::createFromGlobals();
    }
}