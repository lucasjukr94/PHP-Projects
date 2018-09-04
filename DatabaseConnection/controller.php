<?php
include("teste.php");

//[HttpPost]
if($_SERVER["REQUEST_METHOD"] === "POST"){
	$servername = "localhost:3306";
	$username = "root";
	$password = "password";
	$dbname = "teste";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$id = "";
	if(isset($_POST["id"])){
		$id = $_POST["id"];
	}
	$nome = "";
	if(isset($_POST["nome"])){
		$nome = $_POST["nome"];
	}
	$descricao = "";
	if(isset($_POST["descricao"])){
		$descricao = $_POST["descricao"];
	}
	$tipo = "";
	if(isset($_POST["tipo"])){
		$tipo = $_POST["tipo"];
	}
	$valor = 0;
	if(isset($_POST["valor"])){
		$valor = $_POST["valor"];
	}

	$sql = "";
	$enviado = 0;
	if($_POST["enviar"]=="novo"){
		$sql = "insert into tbl_teste(Criado) values(curdate());";
		$enviado = 1;
	}else if($_POST["enviar"]=="salvar"){
		$sql = "update tbl_teste set Atualizado = curdate(),".
				"  Nome = '".$nome."',".
				"  Descricao = '".$descricao."',".
				"  Tipo = '".$tipo."',".
				"  Valor = '".$valor."'".
				" where 1=1 and Id = '".$id."'";
		$enviado = 2;
	}else if($_POST["enviar"]=="excluir"){
		$sql = "delete from tbl_teste where 1=1 and Id = '".$_POST["id"]."'";
		$enviado = 3;
	}else{
		$enviado = 4;
	}
	try{
		mysqli_query($conn,$sql);
	}catch(Exception $e){
		$enviado = 5;
	}
	
	echo $sql;
	
	header("Location: index.php?enviado=".$enviado);
	die();
}else{
	header("Location: index.php");
	die();
}
?>