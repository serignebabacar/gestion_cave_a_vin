<?php 
 namespace App\Controller;
use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;
use \App;
 class UsersController extends AppController{

 	public function login(){
 		$errors=false;
		if(!empty($_POST)){
			$auth=new DBAuth(App::getInstance()->getDB());
			if($auth->login($_POST['username'],$_POST['password'])){
				header('Location: index.php');
			}else{
				$errors=true;
			}
		}
		$form=new BootstrapForm($_POST);
		$this->render('users.login',compact('form','errors'));
	}
	public function deconnexion(){
		session_start();
		session_destroy();
		header('location: index.php');
		exit;
	}
	public function index(){
 		$users=$this->User->all();
 		$this->render('admin.users.index',compact('users'));
 	}
 	public function inscription(){
		$form=new BootstrapForm($_POST);
		$this->render('users.inscription',compact('form'));
	 }
	
 }
 ?>
