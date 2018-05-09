<?php 
// добавить нового врача с аккаунта администратора
	Class Add_doc(){
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
?>