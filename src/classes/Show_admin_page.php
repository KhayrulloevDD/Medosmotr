<?php
// страница администратора
	Class show_admin_page() {
		echo $this->renderer->render('admin_page.twig', array(
			'name' => $_SESSION['user_name']
		));
	}
?>