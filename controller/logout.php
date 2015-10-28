<?php
	include_once dirname(__DIR__).'/model/routes.php';

	session_start();

	session_destroy();

	header("location: $project_index?error=you_not_logged");
?>