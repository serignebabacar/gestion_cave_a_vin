<?php 
 namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;
 class CategoriesController extends AppController{

 	public function __construct(){
 		parent::__construct();
 		$this->loadModel('Questionnaire');
 	}

 	public function index(){
 		$items=$this->Questionnaire->all();
 		$this->render('admin.categories.index',compact('items'));
 	}
 	public function add(){

		if(!empty($_POST)){
			$result=$this->Questionnaire->create([
				'nomQuestionnaire'=>$_POST['nomQuestionnaire'],
			]);
				return $this->index();
		}
		$form=new BootstrapForm($_POST);
		$this->render('admin.categories.edit',compact('form'));
	}

	public function edit(){
		if(!empty($_POST)){
			$result=$this->Questionnaire->update($_GET['id'],[
				'nomQuestionnaire'=>$_POST['nomQuestionnaire'],
			]);
			return $this->index();
		}

		$categorie=$this->Questionnaire->find($_GET['id']);
		$form=new BootstrapForm($categorie);
		$this->render('admin.categories.edit',compact('form'));
	}	

	

	public function delete(){
		if(!empty($_POST)){
			$result=$this->Questionnaire->delete($_POST['id']);
			 return $this->index();
		}
	}
 	
 }
 ?>
