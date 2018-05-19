<?php
// авторизация
	Class Auth($log, $pass){
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
?>