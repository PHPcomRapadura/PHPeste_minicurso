<?php
	//incluir as rotas
	include_once dirname(__DIR__).'/model/routes.php';
	include_once $project_path.'/model/class/Connect.class.php';
	include_once $project_path.'/model/class/Manager.class.php';
	include_once $project_path.'/model/class/User.class.php';

	//Recebendo dados do formulario de login
	$email = $_POST['email'];
	$password = md5($_POST['pass']);

	//criar o objeto Manager
	$manager = new Manager();

	//Tabelas e campos da busca
	$tables['tb_user'] = array();
	$tables['tb_profile'] = array();

	//Relações
	$relationships['tb_user.profile_id'] = "tb_profile.id_profile";

	//filtros da busca
	$filters['user_email'] = $email;

	//realiza a busca
	$user_result = $manager->select_special($tables, $relationships, $filters, ""); 

	//testando se existe usuario com o email
	if($user_result === false){
		header("location: $project_index/index.php?error=user_not_found ");
	}else if($user_result[0]['user_password'] != $password){
		header("location: $project_index/index.php?error=password_incorrect");
	}else{
		//novo objeto usuário
		$user = new User();
		$user->id_user = $user_result[0]['id_user'];
		$user->user_name = $user_result[0]['user_name'];
		$user->user_email = $user_result[0]['user_email'];
		$user->profile_id = $user_result[0]['profile_id'];
		$user->profile_name = $user_result[0]['profile_name'];
		$user->profile_page = $user_result[0]['profile_page'];

		//startar a sessão
		session_start();

		//coloco o objeto dentro da sessao
		$_SESSION[md5('phpeste')] = $user;

		header("location: $project_index");
	}





?>
