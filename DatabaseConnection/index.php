<?php
include("teste.php");

/*
Nota: Nas versões acima de 5.7 do mysql, por exemplo o 8.0, pode haver problemas de conexão de usuário não autorizado caching_sha_...
	  R: Para solucionar esse problema, é necessário abrir o mysql installer e ajustar o mysql server, nos passos a seguir, existe uma opção
	de manter o legado da versão 5.x, selecioná-lo e continuar até finalizar o procedimento.
*/

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

$sql = "select * from tbl_teste;";
$result = $conn->query($sql);

$test_array = array();
//Teste razor foreach
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$test = new teste();
		
		$test->setId($row["Id"]);
		$test->setCriado($row["Criado"]);
		$test->setAtualizado($row["Atualizado"]);
		$test->setNome($row["Nome"]);
		$test->setDescricao($row["Descricao"]);
		$test->setTipo($row["Tipo"]);
		$test->setValor($row["Valor"]);
		
		array_push($test_array, $test);
	}
}
$conn->close();
?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	*{
		font-family:Calibri;
	}
	.content-head{
		width:100%;
		padding:0;
		margin:0;
	}
	.navbar{
		background-color:black;
		padding:0;
		margin:0;
		border-radius:0px;
	}
	.logo{
		padding:20px;
		color:white;
	}
	.menu{
		padding:20px;
		color:white;
	}
	.login{
		padding:20px;
		color:white;
	}
	.navbar-menu{
		list-style-type:none;
	}
	.navbar-menu-list{
		float:left;
		padding:20px;
	}
	.navbar-menu-list:hover{
		background-color:lightgray;
		color:black;
	}
	.navbar-login-menu{
		list-style-type:none;
	}
	.navbar-login-menu-list{
		float:right;
		padding:20px;
	}
	.navbar-login-menu-list:hover{
		background-color:lightgray;
		color:black;
		border-radius:20px;
	}
	</style>
	<style>
	.content-body{
		width:100%;
		padding:0;
		margin:0;
	}
	.content{
		margin-bottom:5px;
		padding:20px;
	}
	</style>
	<style>
	.content-footer{
		width:100%;
		padding:10px;
		margin:0;
		position:absolute;
		bottom:0;
		background-color:black;
		color:white;
		text-align:center;
	}
	</style>
	<style>
	th{
		border:solid thin black;
		padding:5px;
	}
	td{
		border:solid thin black;
		padding:5px;
	}
	</style>
</head>
<body>
	<div class="row content-head">
		<div class="col-xs-12 navbar">
			<div class="col-xs-1 logo">
				<span class="glyphicon glyphicon-th-list"></span>
			</div>
			<div class="col-xs-8 menu" style="padding:0;margin:0;">
				<ul class="navbar-menu">
					<li class="navbar-menu-list">menu-1</li>
					<li class="navbar-menu-list">menu-2</li>
					<li class="navbar-menu-list">menu-3</li>
					<li class="navbar-menu-list">menu-4</li>
					<li class="navbar-menu-list">menu-1</li>
					<li class="navbar-menu-list">menu-2</li>
					<li class="navbar-menu-list">menu-3</li>
					<li class="navbar-menu-list">menu-4</li>
				</ul>
			</div>
			<div class="col-xs-3 login" style="padding:0;margin:0;">
				<ul class="navbar-login-menu">
					<li class="navbar-login-menu-list">login</li>
					<li class="navbar-login-menu-list"><span class="glyphicon glyphicon-user"></span></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row content-body">
		<div class="col-xs-12 content">
			<form method="post" action="/Projects/DatabaseConnection/controller.php" enctype="multipart/form-data">
				<button name="enviar" value="novo" type="submit">Novo</button>
			</form>
			<table style="width:100%;border-collapse: collapse;">
				<thead>
					<tr>
						<th>Id</th>
						<th>Criado</th>
						<th>Atualizado</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Tipo</th>
						<th>Valor</th>
						<th>Salvar</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<tbody>
				<?php
				for($i=0;$i<count($test_array);$i++){
					echo "<form method='post' action='/Projects/DatabaseConnection/controller.php' enctype='multipart/form-data'><tr>".
						"<td><input name='id' type='hidden' id='id_".$i."' value='".$test_array[$i]->getId()."'/>".$test_array[$i]->getId()."</td>".
						"<td>".$test_array[$i]->getCriado()."</td>".
						"<td>".$test_array[$i]->getAtualizado()."</td>".
						"<td><input name='nome' id='nome_".$i."' type='text' style='width:100%;' value='".$test_array[$i]->getNome()."'/></td>".
						"<td><input name='descricao' id='descricao_".$i."' type='text' style='width:100%;' value='".$test_array[$i]->getDescricao()."'/></td>".
						"<td><input name='tipo' id='tipo_".$i."' type='text' style='width:100%;' value='".$test_array[$i]->getTipo()."'/></td>".
						"<td><input name='valor' id='valor_".$i."' type='text' style='width:100%;' value='".$test_array[$i]->getValor()."'/></td>".
						"<td><button name='enviar' id='salvar_".$i."' value='salvar' type='submit' style='width:100%;' onclick='if(!confirm())return false;'>Salvar</button></td>".
						"<td><button name='enviar' id='excluir_".$i."' value='excluir' type='submit' style='width:100%;' onclick='if(!confirm())return false;'>Excluir</button></td>".
					"</tr></form>";
				}
				?>
				</tbody>
			</table>
			<?php
			//error_reporting(0);
			$enviado = 0;
			if(isset($_GET["enviado"])){
				$enviado = $_GET["enviado"];
			}
			switch($enviado){
				case 1:
					echo "linha nova criada com sucesso.";
					break;
				case 2:
					echo "salvo com sucesso.";
					break;
				case 3:
					echo "excluido com sucesso.";
					break;
				case 4:
					echo "é necessário passar um parâmetro.";
					break;
			}
			?>
		</div>
	</div>
	<div class="row content-footer">
		footer
	</div>
	<script>
	</script>
</body>
</html>