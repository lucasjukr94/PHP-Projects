<?php
$login = $_POST["login"];
$senha = $_POST["senha"];

if(strlen(trim($login)) == 0 || strlen(trim($senha)) == 0){
	header("Location: index.php?retorno=1");
	die();
}

include("session.php");

echo $login.$senha."<br/>";

$senha = hash("ripemd160",$senha);
//Verifica se existe login e senha cadastrado no banco de dados
$verifica = verificaNoDB($login,$senha);

//Se existir login e senha cadastrado no Db então cria uma Session
if($verifica == 1){
	session_start();
	$_SESSION["login"] = $login;
	$_SESSION["senha"] = $senha;//Senha em hash
	$_SESSION["criado"] = time();
	echo $_SESSION["login"].$_SESSION["senha"];
	header("Location: adminpageEditor.php");
	die();
}else{
	echo "login ou senha incorretos. Redirecionando";
	header("Location: index.php?retorno=1");
	die();
}
?>
<br/>
<a href="adminpageEditor.php">redirecionar para a página de edição</a>