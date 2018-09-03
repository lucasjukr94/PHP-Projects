<?php
//Acesso direto à essa página serão bloqueadas.
//Está é uma página de controle apenas.
if("/Projects/LoginSession/session.php" == $_SERVER['REQUEST_URI']){
	header("Location: index.php?retorno=2");
	die();
}

function verificaNoDb($login,$senha/*Em hash*/){
	//Fazer a verificação de senha no DB
	echo $login.$senha."<br/>";
	if($login == "super"){
		return 1;
	}else{
		return 0;
	}
}

function verificaSession(){
	session_start();
	//Se o tempo de conexão tiver encerrado retornar
	echo time() - $_SESSION["criado"];
	if(time() - $_SESSION["criado"] > 2000 && time() - $_SESSION["criado"] < 2100){
		echo "<script>$(document).ready(function(){alert('Faltam 1000 segundos para encerrar a sessão');})</script>";
	}
	if(time() - $_SESSION["criado"] > 3000){//3000 segundos = 50 minutos
		unset($_SESSION["login"]);
		unset($_SESSION["senha"]);
		unset($_SESSION["criado"]);
		header("Location: index.php?retorno=3");
		die();
	}
	
	if(strlen(trim($_SESSION["login"])) == 0 || strlen(trim($_SESSION["senha"])) == 0){
		header("Location: index.php?retorno=1");
		die();
	}
	if(verificaNoDb($_SESSION["login"],$_SESSION["senha"]) == 1){
		echo "continua logado";
	}else{
		header("Location: index.php?retorno=1");
		die();
	}
}
?>