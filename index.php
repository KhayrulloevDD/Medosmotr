<?php
	require_once './vendor/autoload.php';
	//require_once './config/database.php';
	require_once './src/bootstrap.php';
	
	class Application {

		private $connection;
		private $renderer;

		public function __construct($option, $page){
			$a = new Session();
			var_dump($a);
			die();
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "medosmotr";

			$loader = new Twig_Loader_Filesystem('./tmp');
			$this->renderer = new Twig_Environment($loader, array('debug'=> true));
			$this->renderer->addExtension(new Twig_Extension_Debug());

			// Create connection
			$this->connection = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($this->connection->connect_error) {
			    die("Connection failed: " . $this->connection->connect_error);
			}
			switch ($option) {
				case 'show':
					if ($page == 'main')
						$this->showMainPage();
					if ($page == 'list')
						$this->show_schedule();
					if ($page == 'sign')
						$this->show_sign();
					if ($page == 'admin_page')
						$this->show_admin_page();
					if ($page == 'doc_page')
						$this->show_doc_page();
					break;
				case 'save':
					$this->save();
					break;
				case 'login': 
					$login = $_POST['name_login'];
					$password = $_POST['name_password'];
					$result = $this->auth($login, $password);
					break;
				case 'addDoc':
					$this->addDoc();
				default:
					break;
			}
		}

		// добавить нового врача с аккаунта администратора
		public function addDoc(){
			if(isset($_POST['login']))
				$login = $_POST['login'];
			if(isset($_POST['password']))
				$password = $_POST['password'];
			if(isset($_POST['type']))
				$type = $_POST['type'];
			if(isset($_POST['name']))
				$name = $_POST['name'];
			if(isset($_POST['desc']))
				$desc = $_POST['desc'];

			$query = "INSERT into users (login, password, type, fullname, description) VALUES ('$login', '$password', '$type', '$name', '$desc')";

			if ($this->connection->query($query) === TRUE) {
			    header("location: /index.php?option=show&page=admin_page&success=1");
			} else {
			    echo "Ошибка при записи к врачу";
			}
		}

		// авторизация
		public function auth($log, $pass){
			$query = "SELECT * FROM users WHERE login = '$log' AND password = '$pass'";
			$result = $this->connection->query($query);
			$data = [];
			while($row = $result->fetch_array()){
				$data[] = $row;
			}
			if (count($data) == 0){
				header('Location: ?option=show&page=sign');
			}
			else{
				$user = $data[0];
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['user_name'] = $user['fullName'];
				if ($user['role'] == '0')
					header('Location: ?option=show&page=admin_page');
				else if ($user['role'] == '1')
					header('Location: ?option=show&page=doc_page');
				else{
					header('Location: ?option=show&page=sign');
				}
			}
		}

		// страница администратора
		public function show_admin_page() {
			echo $this->renderer->render('admin_page.twig', array(
				'name' => $_SESSION['user_name']
			));
		}

		// личный кабинет врача
		public function show_doc_page() {
			echo $this->renderer->render('doc_page.twig', array(
				'name' => $_SESSION['user_name']
			));
		}

		// страница записавшихся студентов
		public function show_schedule(){
			$type = 1;
			if (isset($_GET['type']))
				$type = $_GET['type'];

			if ($type == 1)
				$doc_name = "Терапевту";
			if ($type == 2)
				$doc_name = "Окулисту";
			if ($type == 3)
				$doc_name = "Венерологу";
			if ($type == 4)
				$doc_name = "Неврологу";
			if ($type == 5)
				$doc_name = "Наркологу";

			$query = "SELECT * FROM raspisanie where type = $type";
			$result = $this->connection->query($query);
			while($row = $result->fetch_array()){
				$data[] = $row;
			}
			echo $this->renderer->render('list.twig', array(
				'schedule'=> $data,
				'doc_name'=> $doc_name
			));
		}

		// главная страница
		public function showMainPage(){
			$success = false;
			if (isset($_GET['success']) && $_GET['success'] == 1)
				$success = true;
			echo $this->renderer->render('main.twig', array(
				'success'=> $success
			));
		}

		// страница входа учётной записи
		public function show_sign(){
			echo $this->renderer->render('sign.twig', array());
		}

		public function editDocSchedule($str){
			$query = "SELECT * FROM doc_schedule where type = 1"; // выбираем график врача(строка)
			$result = $this->connection->query($query);
			$row = $result->fetch_array();
			$schedule_array = explode (",", $row['schedule']); // заводим в массив
			if (in_array($str, $schedule_array))
				echo "Данное время уже есть в графике приёма врача!";
			echo $schedule_array[0];
		}

		// обработка данных для записи к врачу
		public function save(){
			if(isset($_POST['name']))
				$name = $_POST['name'];
			if(isset($_POST['group']))
				$group = $_POST['group'];
			if(isset($_POST['email']))
				$email = $_POST['email'];
			if(isset($_POST['phone']))
				$phone = $_POST['phone'];
			if(isset($_POST['date']))
				$date = $_POST['date'];
			if(isset($_POST['time']))
				$time = $_POST['time'];
			if(isset($_POST['doc_type']))
				$doc_type = $_POST['doc_type'];

			$query = "INSERT into raspisanie (name, gr, email, phone, date, time, type) VALUES ('$name', '$group', '$email', '$phone', '$date', '$time', '$doc_type')";

			if ($this->connection->query($query) === TRUE) {
			    header("location: /index.php?option=show&page=main&success=1");
			} else {
			    echo "Ошибка при записи к врачу";
			}
		}
	}

	$option = "show";
	if (isset($_GET['option']))
		$option = $_GET['option'];
	$page = "main";
	if (isset($_GET['page']))
		$page = $_GET['page'];

	$Application = new Application($option, $page);
?>