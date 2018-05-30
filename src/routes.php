<?php

return [
	//1-method 2-option 3-page
    //Main page
    ['GET', '/', ['Index' => 'main']],
    //Страница входа
    ['GET', '/signin', ['Auth' => 'signin']],
    //Авторизация
    ['POST', '/auth', ['Auth' => 'login']],
    //Выход
    ['GET', '/auth', ['Auth' => 'logout']],
    //добавить врача
    ['POST', '/user/saveDoc', ['Users' => 'addDoc']],
    //удалить врача
    ['GET', '/user/{login}/removeDoc', ['Users' => 'deleteDoc']],
    //добавить пациента
    ['POST', 'user/savePatient', ['Users' => 'addPatient']],
    //удалить пациента
    ['GET', 'user/{id}/removePatient', ['Users' => 'deletePatient']],
    //вход в админ панель
    ['GET', '/adminPage', ['Users' => 'showAdminPage']],
    //вход в личный кабиент врача
    ['GET', '/docPage', ['Users' => 'showDocPage']],
];