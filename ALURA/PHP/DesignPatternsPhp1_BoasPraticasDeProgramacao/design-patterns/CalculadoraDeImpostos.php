<?php
	
	class CalculadoraDeImpostos {

		public function calculaICMS(Orcamento $Orcamento) {
			return $Orcamento->getValor() * 0.05;
		}

		public function calculaISS(Orcamento $Orcamento) {
			return $Orcamento->getValor() * 0.1;
		}		
	}

?>