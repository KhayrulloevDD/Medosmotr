<?php

namespace App\Controllers;

use App\Models\Patients;
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
    	$group = $this->request->request->get('group');
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
        $response = new RedirectResponse('/', 301);
        return $response->send();
    }

    public function deletePatient($id){
        $user = new Patient($id);
    	$user->removePatient($id);

    }

    public function showAdminPage(){
    	$user = Session::instance();
        $type = $user->get('user_id');
        $name = $user->get('user_name');
        $users = new User();
        $data = $users->getAllDocs();

    	echo $this->renderer->render('admin_page.twig', [
    		'name' => $name,
    		'docData' => $data
    	]);
    }

    public function showDocPage(){

        $user = Session::instance();
        $type = $user->get('user_id');
        $name = $user->get('user_name');

        $patients = new Patient();
        $all = $patients->getAllPatientsByType($type);

    	echo $this->renderer->render('doc_page.twig', [
    		'schedule' => $all,
    		'name' => $name
    	]);
    }
}