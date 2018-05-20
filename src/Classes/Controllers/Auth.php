<?php

namespace App\Controllers;

use App\preDispatch;
use App\Models\User;
use Helpers\Session;

class Auth extends preDispatch
{
    public function signin()
    {
        echo $this->renderer->render('sign.twig', array());
    }

    public function login()
    {
        $login = $this->request->request->get('name_login');
        $password = $this->request->request->get('name_password');

        $user = new User();
        $user->getByLoginAndPassword($login, $password);

        // User is not exists
        if (!$user->exists) {
            // @todo
        } else {
            $session = Session::instance();
            $session->set('user_id', $user->id);
            $session->set('user_name', $user->username);
            $session->set('user_role', $user->role);
        }

    }

    public function logout()
    {

    }
}