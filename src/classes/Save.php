<?php
// обработка данных для записи к врачу
	Class Save(){
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
?>