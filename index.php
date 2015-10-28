<?php

	//rotas do projeto
	include_once 'model/routes.php';
	//eventos
	include_once 'controller/events.php';
	//Dicionário
	include_once 'model/dictionary.php';

	//Classe do usuario
	include_once 'model/class/User.class.php';
 
	//testar se usuário já está logado
	session_start();

	if(isset($_SESSION[md5('phpeste')])){
		$user = $_SESSION[md5('phpeste')];
		header("location: ".$user->profile_page.".php");
	}


	//titulo da pagina
	$page_title = "Página Inicial";

	//função do conteudo da pagina
	function page_content(){
		//dispara os eventos de erros
		events_error();


		include_once 'view/login.html';	
	}

	//template(layout) do projeto
	include_once 'view/template.html';
?>