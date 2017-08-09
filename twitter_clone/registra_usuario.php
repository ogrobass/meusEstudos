<?php

require_once('bd.class.php');

//$_POST
//$_GET

$usuario	= $_POST['usuario'];
$email 		= $_POST['email'];
$senha		= md5($_POST['senha']);

$objBd = new bd();
$objBd->conecta_mysql();

$sql = " insert into usuarios(usuario, email, senha)values('$usuario', '$email', '$senha') ";

if(mysql_query($sql)){
	echo 'Usuário foi registrado com sucesso!';
} else {
	echo 'Erro ao tentar inserir o registro';
}

?>