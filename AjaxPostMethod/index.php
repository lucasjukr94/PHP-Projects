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
			<input type="text" id="text" />
			<button type="button" onclick="enviar();">enviar</button>
			<?php
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
				
				//Essencial para decodificar a string json passada via ajax
				$data = json_decode(file_get_contents('php://input'), true);
				print_r($data);
				
				$sql = "insert into tbl_teste(Criado,Nome) values(curdate(),'".$data["text"]."')";
				try{
					mysqli_query($conn,$sql);
				}catch(Exception $e){
					$enviado = 5;
				}
				$conn->close();
			}
			?>
		</div>
	</div>
	<div class="row content-footer">
		footer
	</div>
	<script>
	function enviar(){
		var json = { "text" : document.getElementById("text").value };
		$.ajax({
			type: "POST",
			url: "/Projects/AjaxPostMethod/index.php",
			data: JSON.stringify(json),
			contentType: "application/json; charset=utf-8",
			success: function(){
				console.log("foi");
			},
			error: function(){
				console.log("n foi");
			}
		});
	}
	</script>
</body>
</html>