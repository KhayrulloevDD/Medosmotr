<?php

namespace App\Controllers;

use \App\preDispatch;
use \App\Models\User;
use \App\Models\Patient;
use \Helpers\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Users extends preDispatch
{
    public function addDoc(){
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

        $user->saveDoc();

        $response = new RedirectResponse('/adminPage', 301);
        return $response->send();

    }

    public function deleteDoc($login){
    	$user = new User();
    	$user->removeDoc($login);

        $response = new RedirectResponse('/adminPage', 301);
        return $response->send();
    }

    public function addPatient(){
    	$name = $this->request->request->get('name');
    	$group = $this->request->request->get('gr');
    	$email = $this->request->request->get('email');
    	$phone = $this->request->request->get('phone');
    	$date = $this->request->request->get('date');
    	$time = $this->request->request->get('time');
    	$type = $this->request->request->get('type');

    	$user = new Patient();
    	$user->name = $name;
    	$user->group = $group;
    	$user->email = $email;
    	$user->phone = $phone;
    	$user->date = $date;
    	$user->time = $time;
    	$user->type = $type;

    	$user->savePatient();

        $response = new RedirectResponse('/adminPage', 301);
        return $response->send();
    }

    public function deletePatient($id){
    	//достать $id пациента и передать в функцию
        $user = new Patient($id);
    	$user->removePatient($id);

    }

    public function showAdminPage(){
    	echo $this->renderer->render('admin_page.twig', []);
    }

    public function showDocPage(){

    	echo $this->renderer->render('doc_page.twig', []);
    }
}