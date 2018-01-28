<?php
	require_once './vendor/autoload.php';

	class Application {

	private $connection;
	private $renderer;

	public function __construct($option, $page){
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
				if ($page == 'main'){
					$this->showMainPage();
				}
				if ($page == 'list'){
					$this->show_schedule();
				}
				break;
			case 'save':
				$this->save();
				break;
			default:
				break;
		}
	}

	public function show_schedule(){
		$type = 0;
		if (isset($_GET['type']))
			$type = $_GET['type'];

		if ($type == 0)
			$doc_name = "Терапевту";
		if ($type == 1)
			$doc_name = "Окулисту";
		if ($type == 2)
			$doc_name = "Венеролог";
		if ($type == 3)
			$doc_name = "Невролог";
		if ($type == 4)
			$doc_name = "Нарколог";

		$query = "SELECT * FROM raspisanie where type = $type";
		$result = $this->connection->query($query);
		//$data = $result->fetch_array();
		while($row = $result->fetch_array()){
			$data[] = $row;
		}
		echo $this->renderer->render('list.twig', array(
			'schedule'=> $data,
			'doc_name'=> $doc_name
		));
	}

	public function showMainPage(){
		$success = false;
		if (isset($_GET['success']) && $_GET['success'] == 1)
			$success = true;
		echo $this->renderer->render('main.twig', array(
			'success'=> $success
		));
	}

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
		    //echo "Error: " . $sql . "<br>" . $conn->error;
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
/*$Application->run();*/
?>