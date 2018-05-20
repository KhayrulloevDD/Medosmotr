<?php

namespace App\Controllers;

use \App\preDispatch;
use \App\Models\User;
use \Helpers\Session;

class Index extends preDispatch
{
    public function main()
    {
        $success = $this->request->query->get('success') ?: false;
        echo $this->renderer->render('main.twig', array(
            'success'=> $success
        ));
    }
}