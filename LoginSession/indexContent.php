<style>
.loginBox{
	background-color:lightgray;
	border-radius:20px;
	padding:20px;
	width:400px;
	margin-left:40%;
	margin-top:10%;
}
td{
	padding:5px;
}
</style>
<div class="loginBox">
	<form method="post" action="adminpage.php">
		<table style="width:100%;">
			<tbody>
				<tr>
					<td>Login</td>
					<td>
						<input type="text" name="login" style="width:100%;"/>
					</td>
				</tr>
				<tr>
					<td>Senha</td>
					<td>
						<input type="password" name="senha" style="width:100%;"/>
					</td>
				</tr>
			</tbody>
		</table>
		<button type="submit">Submit</button>
	</form>
</div>
<?php
error_reporting(0);
if($_SERVER["REQUEST_METHOD"] === "GET"){
	if($_GET["retorno"] == 1){
		echo "login ou senha incorretos.";
	}else if($_GET["retorno"] == 2){
		echo "sem permissão.";
	}else if($_GET["retorno"] == 3){
		echo "tempo de conexão encerrada.";
	}
}
?>