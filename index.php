<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Helpers\App;

require_once './app/install.php';

$request = Request::createFromGlobals();

$method = $request->server->get('REQUEST_METHOD');
$uri = parse_url($request->getRequestUri(), PHP_URL_PATH);

App::fireRequest($method, $uri);

$response = Response::create();

// отправляем браузеру ответ
$response->send();

//    // личный кабинет врача
//    public function show_doc_page() {
//        echo $this->renderer->render('doc_page.twig', array(
//            'name' => $_SESSION['user_name']
//        ));
//    }
//
//    // страница записавшихся студентов
//    public function show_schedule(){
//        $type = 1;
//        if (isset($_GET['type']))
//            $type = $_GET['type'];
//
//        if ($type == 1)
//            $doc_name = "Терапевту";
//        if ($type == 2)
//            $doc_name = "Окулисту";
//        if ($type == 3)
//            $doc_name = "Венерологу";
//        if ($type == 4)
//            $doc_name = "Неврологу";
//        if ($type == 5)
//            $doc_name = "Наркологу";
//
//        $query = "SELECT * FROM raspisanie where type = $type";
//        $result = $this->connection->query($query);
//        while($row = $result->fetch_array()){
//            $data[] = $row;
//        }
//        echo $this->renderer->render('list.twig', array(
//            'schedule'=> $data,
//            'doc_name'=> $doc_name
//        ));
//    }

?>
