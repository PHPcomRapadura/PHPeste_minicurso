<?php
	function events_error(){
		global $project_path, $dictionary;

		if(!isset($_GET['error'])){
			return false;
		}

		//mensagem
		$msg = $_GET['error'];
		$alert_msg = $dictionary[$msg];
		//icone
		$alert_icon = "warning-sign";
		//classe(cor)
		$alert_class = "danger";

		include_once $project_path.'/view/alert.html';
	}
?>