<?php

namespace App\Controllers;

use App\preDispatch;

class Index extends preDispatch
{
    public function main()
    {
        echo $this->renderer->render('main.twig', []);
    }
}