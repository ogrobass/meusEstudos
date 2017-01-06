<?php 

class homeController extends controller{
	
	public function index() {
		//echo "Olá Mundo!";
		$usuario = new usuario();
		$usuario->setName("Marcel"); 

		$dados = array(
			'name' => $usuario->getName()
		);

		//echo "Meu nome &eacute;: ".$usuario->getName();
		$this->loadView('home', $dados);
	}	

}	

?>