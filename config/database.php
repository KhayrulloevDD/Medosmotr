<?php
	Class Database {

		private static $_instance = null;
		public $connection;
		private function __construct() {
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "medosmotr";
			// Create connection
			$this->$connection = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($this->$connection->connect_error) {
			    die("Connection failed: " . $this->connection->connect_error);
			}
		}

		private function __clone() {}

		private function __sleep() {}

		public static function instance() {
			if (self::$_instance) {
				return self::$_instance;
			}

			self::$_instance = new self();
			return self::$_instance;
		}
	}
?>