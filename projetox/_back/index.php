<?php 
	
	require 'usuario.php';

	$usuario = new Usuario(1);

	//$usuario->setEmail("teste@teste.com");
	//$usuario->setSenha("123");
	$usuario->setNome("Teste Nome");
	$usuario->deletar();

	echo "Sucesso!";
?>