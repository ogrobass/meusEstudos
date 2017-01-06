<?php 
 	/*
	require 'banco.php';

	$banco = new Banco("localhost", "blog", "root", "");


	//var_dump($banco);

	$banco->query("SELECT * FROM posts");

	$numero = $banco->numRows();

	echo "Qtd de posts: ".$numero."<hr>";

	if($banco->numRows() > 0) {
		foreach ($banco->result() as $post) {
			echo "<u>ID: ".$post['id']."</u><br>";	
			echo "<strong>Titulo: ".$post['titulo']."</strong><br>";
			echo "Corpo: ".$post['corpo']."<br><hr>";
		}

	} else {
		echo "Não houve resultado!";		
	}
	*/

	//print_r($banco->result());
	/*
	if($_GET['insert']) {
		echo "<hr>";
		$banco->insert('posts', array(
			"titulo" => 'Titulo de Teste',
			"corpo"  => 'Corpo de Teste'
	 	));		
	}
	*/

	/*
	if($_GET['update']) {
		echo "<hr>";
		$banco->update('posts', 
			array("titulo" => 'Titulo de Teste'), 
			array('id' => '1')
		);		
	}
	*/
	
	/*
	if($_GET['update']) {
		echo "<hr>";
		$banco->delete('posts', 
			array('id' => '10')
		);		
	}
	*/	
?>