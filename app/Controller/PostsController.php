<?php 
 namespace App\Controller;
 use  Core\Controller\Controller;
 use \App;
 class PostsController extends AppController{

 	public function __construct(){
 		parent::__construct();
 		$this->loadModel('Vin');
 		//$this->loadModel('Bouteille');
 	}
 	public function index(){
 		$posts=$this->Vin->last();
 		//$categories=$this->Bouteille->all();
 		$this->render('posts.index',compact('posts','categories'));
 	}

 	public function categorie(){
		$categorie=$this->Bouteille->find($_GET['id']);
    	if ($categorie===false){
       		$this->notFound();
    	}
		$articles=$this->Vin->lastByCategory($_GET['id']);
    	$categories=$this->Bouteille->all();
    	$this->render('posts.categorie',compact('articles','categories','categorie'));
 	}

 	public function show(){
 		$article=$this->Vin->findWithCategorie($_GET['id']);
 		$this->render('posts.show',compact('article'));
 	}
 }
 ?>
