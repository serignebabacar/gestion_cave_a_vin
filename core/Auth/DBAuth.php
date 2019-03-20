<?php
namespace Core\Auth;

use Core\Database\Database;

class DBAuth{

	private $db;
	public function __construct(Database $db){
		$this->db=$db;
	}
	//cette fonction retourne l'id de lutilisateur qui s'est connecté
	public function getUserId(){
		if($this->logged()){
			return $_SESSION['auth'];
		}
		return false;
	}
	/**
    *@param $nom
   	*@param $mdp
   	*@return boolean 
	*/
	public function login($nom,$mdp){
		$user=$this->db->prepare('SELECT * FROM utlisateur WHERE  email=? ',[$nom],null,true);
		
		if($user){
			if($user->mot_pass === md5($mdp)){
				
				$_SESSION['auth']=$user->id;
				$_SESSION['nom']=$user->nom;
				$_SESSION['mdp']=$user->mot_pass;
				$_SESSION['pseudo']=$user->email;
				return true;
			}

		}
		return false;
	}
	//fonction qui verifie si l'administrateur s'est connecté
	public function adminLogged(){
		if($this->logged()  && ($_SESSION['pseudo']== "admin@gmail.com")  && ($_SESSION['mdp']==md5("admin"))){
				return true ;
		}
		return false;
	}
	// fonction qui teste la connexion d'un utilisateur
	public function logged(){
		return isset($_SESSION['auth']);
	}
	// cette fonction prend en parametre une id et retourne le nom de lutlisateur correspondant
	public function getUserNom($id){
		if ($this->logged()){
		return $_SESSION['nom'];
		}
	}

}