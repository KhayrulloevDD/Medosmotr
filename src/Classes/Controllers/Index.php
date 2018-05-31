<?php

namespace App\Controllers;

use \App\preDispatch;
use \App\Models\User;
use \Helpers\Session;

class Index extends preDispatch
{
    public function main()
    {
        /*$user = Session::instance();
        $type = $user->get('user_id');
        $name = $user->get('user_name');*/
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