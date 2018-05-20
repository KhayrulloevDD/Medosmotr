<?php

namespace App\Controllers;

use \App\preDispatch;
use \App\Models\User;
use \Helpers\Session;

class Users extends preDispatch
{
    public function save(){
    	$fullName = $this->request->request->get('name');
    	$login = $this->request->request->get('login');
    	$password = $this->request->request->get('password');
    	$role = 1;
        $type = $this->request->request->get('type');
        $description = $this->request->request->get('desc');

        $user = new User();
        $user->fullName = $fullName;
        $user->login = $login;
        $user->password = $password;
        $user->role = $role;
        $user->type = $type;
        $user->description = $description;

        $user->save();
        header("location: /adminPage");
    }

    public function delete($login){
    	$user = new User();
    	$user->remove($login);
    }

    public function showAdminPage(){
    	echo $this->renderer->render('admin_page.twig', []);

    }
}