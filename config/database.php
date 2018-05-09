<?php
	$connection;
	$renderer;
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

?>