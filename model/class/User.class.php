<?php
	class User{
		private $user_data;

		//recebe nome do atributo e valor...
		public function __set($name, $value){
			$this->user_data[$name] = $value;
		}

		public function __get($name){
			return $this->user_data[$name];
		}
	}

?>