<?php	

	class Core {

		public function run() {
			$url = substr($_SERVER['PHP_SELF'], 19);

			//echo $url;

			if(!empty($url)) {
				$url = explode("/", $url);
				array_shift($url);

				$currentController = $url[0].'Controller';
				if(isset($url[1])) {
					$currentAction = $url[1];
				} else {
					$currentAction = 'index';
				}

			} else {
				$currentController = 'homeController';
				$currentAction = 'index';				
			}	

			//echo "<hr>CONTROLLER: ".$this->currentController;
			//echo "<hr>ACTION: ".$this->currentAction;

			require_once 'core/controller.php';

			$c = new $currentController();
			$c->$currentAction();
		}  

	}

?>
