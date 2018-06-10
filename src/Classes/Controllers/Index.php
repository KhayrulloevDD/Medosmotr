<?php

namespace App\Controllers;

use \App\preDispatch;
use \App\Models\User;
use \Helpers\Session;

class Index extends preDispatch
{
    public function main()
    {
        $session = Session::instance();
        $name = $session->get('user_name');
        $status = $session->get('user_role');

    	$user = new User();
        $allDocs = $user->getAllDocs();
        $success = $this->request->query->get('success') ?: false;
        echo $this->renderer->render('main.twig', array(
            'success'=> $success,
            'docs' => $allDocs,
            'name' => $name,
            'status' => $status
        ));
    }
}