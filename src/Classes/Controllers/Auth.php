<?php

namespace App\Controllers;

use App\preDispatch;
use App\Models\User;
use Helpers\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
            $response = new RedirectResponse('/signin', 301);
            return $response->send();
        } else {
            $session = Session::instance();
            $session->set('user_id', $user->id);
            $session->set('user_name', $user->fullName);
            $session->set('user_role', $user->role);
            if ($session->get('user_role') == 0) {
                $response = new RedirectResponse('/adminPage', 301);
            } else if ($session->get('user_role') == 1) {
                $response = new RedirectResponse('/docPage', 301);
            }

            return $response->send();
        }

    }

    public function logout()
    {
        Session::instance()->destroy();

        $response = new RedirectResponse('/', 301);
        return $response->send();

    }
}