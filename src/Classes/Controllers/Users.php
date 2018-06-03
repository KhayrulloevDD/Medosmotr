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

    public function refreshShedule(){
        $monday_start = $this->request->get('select_mon_from');
        $monday_end = $this->request->get('select_mon_till');
        $monday_checkbox = $this->request->get('checkbox_mon');

        $tuesday_start = $this->request->get('select_tue_from');
        $tuesday_end = $this->request->get('select_tue_till');
        $tuesday_checkbox = $this->request->get('checkbox_tue');

        $wednesday_start = $this->request->get('select_wed_from');
        $wednesday_end = $this->request->get('select_wed_till');
        $wednesday_checkbox = $this->request->get('checkbox_wed');

        $thursday_start = $this->request->get('select_thur_from');
        $thursday_end = $this->request->get('select_thur_till');
        $thursday_checkbox = $this->request->get('checkbox_thur');

        $friday_start = $this->request->get('select_fri_from');
        $friday_end = $this->request->get('select_fri_till');
        $friday_checkbox = $this->request->get('checkbox_fri');

        $saturday_start = $this->request->get('select_sat_from');
        $saturday_end = $this->request->get('select_sat_till');
        $saturday_checkbox = $this->request->get('checkbox_sat');

        $sunday_start = $this->request->get('select_sun_from');
        $sunday_end = $this->request->get('select_sun_till');
        $sunday_checkbox = $this->request->get('checkbox_sun');

        $user = new User();
        $id = $user->get('user_id');
        $user->updateSchedule($id, $monday_start, $monday_end, $monday_checkbox, $tuesday_start, $tuesday_end, $tuesday_checkbox, $wednesday_start, $wednesday_end, $wednesday_checkbox, $thursday_start, $thursday_end, $thursday_checkbox, $friday_start, $friday_end, $friday_checkbox, $saturday_start, $saturday_end, $saturday_checkbox, $sunday_start, $sunday_end, $sunday_checkbox);

        $response = new RedirectResponse('/docPage', 301);
        return $response->send();
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

        $user = new User();
        $schedule = $user->getScheduleById(1);

    	echo $this->renderer->render('doc_page.twig', [
    		'list' => $all,
    		'name' => $name,
            'schedule' => $schedule
    	]);
    }
}