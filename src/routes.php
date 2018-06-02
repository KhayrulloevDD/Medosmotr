<?php

return [
	//1-method 2-option 3-page
    //главная страница
    ['GET', '/', ['Index' => 'main']],
    //страница входа
    ['GET', '/signin', ['Auth' => 'signin']],
    //авторизация
    ['POST', '/auth', ['Auth' => 'login']],
    //выход
    ['GET', '/logout', ['Auth' => 'logout']],
    //добавить врача
    ['POST', '/user/saveDoc', ['Users' => 'addDoc']],
    //удалить врача
    ['GET', '/user/{login}/removeDoc', ['Users' => 'deleteDoc']],
    //добавить пациента
    ['POST', '/user/savePatient', ['Users' => 'addPatient']],
    //удалить пациента
    ['GET', '/user/{id}/removePatient', ['Users' => 'deletePatient']],
    //вход в админ панель
    ['GET', '/adminPage', ['Users' => 'showAdminPage']],
    //вход в личный кабиент врача
    ['GET', '/docPage', ['Users' => 'showDocPage']],
    //страница записавшихся пациентов врача
    ['GET', '/display/{id}', ['Display' => 'displaySchedule']],
    //обработка запроса раписания врача
    ['POST', '/refreshShedule', ['Users' => 'refreshShedule']]
];