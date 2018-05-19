<?php

namespace App\Controllers;

use \App\preDispatch;
use \App\Models\User;
use \Helpers\Session;

class Index extends preDispatch
{
    public function main($user)
    {
        /** Example */
        $user = new User();
        $user->login = 'Dodullo';
        $user->password = 'admin';
        $user->username = 'Khayrullozoda';
        $user->save();

        /** Example */
        $session = Session::instance();
        $session->get('user_id');

        echo $this->renderer->render('main.twig', []);
    }
}