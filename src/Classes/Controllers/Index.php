<?php

namespace App\Controllers;

use \App\preDispatch;
use \App\Models\User;
use \Helpers\Session;

class Index extends preDispatch
{
    public function main()
    {
    	$user = new User();
        $allDocs = $user->getAllDocs();
        $success = $this->request->query->get('success') ?: false;
        echo $this->renderer->render('main.twig', array(
            'success'=> $success,
            'docs' => $allDocs
        ));
    }
}