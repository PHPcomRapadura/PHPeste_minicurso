<?php
	include_once 'model/routes.php';
	include_once 'model/dictionary.php';
	include_once 'model/class/User.class.php';

	//titulo da pagina
	$page_title = "Administrador";

	//testar se usuario realmente está logado
	session_start();

	if(!isset($_SESSION[md5('phpeste')])){
		header("location: index.php?error=permission_denied");
	}else{
		$user = $_SESSION[md5('phpeste')];
		//testa o perfil
		if($user->profile_page != "admin"){
			header("location: index.php?error=permission_denied");	
		}
	}

	//conteudo
	function page_content(){
		global $user;

		echo '<h1>Bem vindo, <strong>',$user->user_name,'</strong></h1>'; 
		echo '<a href="controller/logout.php">Sair</a>';
	}

	include_once 'view/template.html';
?>