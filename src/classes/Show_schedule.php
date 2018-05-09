<?php
// страница записавшихся студентов
	Class show_schedule(){
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
?>