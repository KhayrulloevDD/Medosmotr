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
            var_dump("net user");
            die();
        } else {
            $session = Session::instance();
            $session->set('user_id', $user->id);
            $session->set('user_name', $user->fullName);
            $session->set('user_role', $user->role);
            header("location: /adminPage");
        }

    }

    public function logout()
    {

    }
}