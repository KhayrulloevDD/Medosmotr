<?php

	/**
	 *
	 */
	Class Session {

		/**
		 *
		 */
		private $_instance = null;

		/**
		 * @private
		 */
		private __construct() {
			session_start();
		}

		private __clone() {}

		private __sleep() {}

		public static function instance() {
			if (self::$_instance) {
				return self::$_instance;
			}

			self::$_instance = new self();
			return self::$_instance;
		}

		public function get($key) {
			return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
		}

		public function set($key, $value) {
			$_SESSION[$key] = $value;
			return true;
		}
	}
?>
