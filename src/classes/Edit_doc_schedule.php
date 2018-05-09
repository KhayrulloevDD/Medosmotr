<?php
	Class Edit_doc_schedule($str){
		$query = "SELECT * FROM doc_schedule where type = 1"; // выбираем график врача(строка)
		$result = $this->connection->query($query);
		$row = $result->fetch_array();
		$schedule_array = explode (",", $row['schedule']); // заводим в массив
		if (in_array($str, $schedule_array))
			echo "Данное время уже есть в графике приёма врача!";
		echo $schedule_array[0];
	}
?>