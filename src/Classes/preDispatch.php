<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;

class preDispatch
{
    protected $renderer;

    protected $request;

    //preDispatch constructor
    public function __construct()
    {
        // initialize Twig
        $loader = new \Twig_Loader_Filesystem(ROOT . '/templates');
        $this->renderer = new \Twig_Environment($loader, array('debug'=> true));
        $this->renderer->addExtension(new \Twig_Extension_Debug());

        $this->request = Request::createFromGlobals();
    }
}

// Родительский класс от которого наследуются все контроллеры.
// Внутри этого класса происходит инициализация шаблонизатора twig и других библиотек
// Также подгружает элементы представления