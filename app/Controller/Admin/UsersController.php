<?php 
 namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;
 class UsersController extends AppController{

 	public function __construct(){
 		parent::__construct();
 		$this->loadModel('Utlisateur');
 	}
 	public function index(){
 		$users=$this->Utlisateur->all();
 		$this->render('admin.users.index',compact('users'));
 	}
 	public function add(){

		if(!empty($_POST)){
			$result=$this->Utlisateur->create([
				'nom'=>$_POST['nom'],
				'prenom'=>$_POST['prenom'],
				'email'=>$_POST['email'],
				'mot_pass'=>md5($_POST['motdepass']),
			]);
			if($result){
				return $this->index();
			}
		}
		$form=new BootstrapForm($_POST);
		$this->render('admin.users.edit',compact('form'));
	}
	public function edit(){
		if(!empty($_POST)){
			$result=$this->Utlisateur->update($_GET['id'],[
				'nom'=>$_POST['nom'],
				'prenom'=>$_POST['prenom'],
				'email'=>$_POST['email'],
				'mot_pass'=>md5($_POST['mot_pass']),
			]);
			header('Location:index.php');
		}
		$user=$this->Utlisateur->find($_GET['id']);
		$form=new BootstrapForm($user);
		$this->render('admin.users.edit',compact('form'));
	}	
	public function delete(){
		if(!empty($_GET)){
			$result=$this->Utlisateur->delete($_GET['id']);
			 return $this->index();
		}
	}
 }