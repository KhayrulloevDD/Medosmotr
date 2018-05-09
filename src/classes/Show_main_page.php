<?php
// главная страница
	Class Show_main_page(){
		$success = false;
		if (isset($_GET['success']) && $_GET['success'] == 1)
			$success = true;
		echo $this->renderer->render('main.twig', array(
			'success'=> $success
		));
	}
?>