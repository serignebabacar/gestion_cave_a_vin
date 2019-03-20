<?php 
 namespace Core\Controller;
 class Controller{
 		
 	protected $viewPath;	
 	protected $template;
	//cette fonction prend en parametre la page a afficher et les variables a mettre
 	protected function render($view,$variables=[]){
 		ob_start();
 		extract($variables);
 		require($this->viewPath.str_replace('.','/',$view).'.php');
 		$content=ob_get_clean();
 		require ($this->viewPath.'templates/'.$this->template.'.php');
 	}
	//cette fonction est utilisee en cas de non connexion
 	protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit ');
    }
	//cette fonction est pour les pages qui ne sont incluses du site
    protected function notFound(){
        header("HTTP/1.0 404 Not Found");
        die('page introuvable');
    }

 }
 ?>
