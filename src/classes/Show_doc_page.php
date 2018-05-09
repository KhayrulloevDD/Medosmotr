<?php
// личный кабинет врача
	Class show_doc_page() {
		echo $this->renderer->render('doc_page.twig', array(
			'name' => $_SESSION['user_name']
		));
	}
?>