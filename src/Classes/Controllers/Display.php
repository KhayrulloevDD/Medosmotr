<?php

namespace App\Controllers;

use App\Models\Patients;
use \App\preDispatch;
use \App\Models\User;
use \App\Models\Patient;
use \Helpers\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Display extends preDispatch
{
    public function displaySchedule($id){

        $user = new User($id);
        $type = $user->type;

        $patient = new Patient();
        $allPatients = $patient->getAllPatientsByType($id);

        echo $this->renderer->render('list.twig', [
            'type' => $type,
            'schedule' => $allPatients
        ]);
    }
}