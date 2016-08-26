<?php
require 'config.php';

if (isset($_POST['nome']) && empty($_POST['nome'] == false)) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));
	
	$sql = "INSERT INTO usuarios SET nome ='$nome', email = '$email', senha = '$senha'";
	$pdo->query($sql);

	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Modulo 5 - Intermediario</title>
</head>
<body>

	<form action="" method="post">
		Nome:<br>
		<input type="text" name="nome"><br>
		Email:<br>
		<input type="text" name="email"><br>
		Senha:<br>
		<input type="password" name="senha">

		<hr>
		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>


