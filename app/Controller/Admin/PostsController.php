<?php 
namespace App\Controller\Admin;
use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;
use \App;
 class PostsController extends AppController{

 	public function __construct(){
 		parent::__construct();
		 $this->loadModel('Vin');
		 $this->loadModel('Sortie');
		 $this->loadModel('Entree');
		 $this->loadModel('Bouteille');
		 $this->loadModel('Commentaire');
		 $this->loadModel('Region');
		 $this->loadModel('Cave');
 	}

 	public function index(){
		$auth=new DBAuth(App::getInstance()->getDB());
		$posts=$this->Vin->allTable($auth->getUserId());
		$sorties=$this->Sortie->allTable($auth->getUserId());
		$entrees=$this->Entree->allTable($auth->getUserId());
 		$this->render('admin.posts.index',compact('posts','sorties','entrees'));
 	}
 	public function add(){
		$auth=new DBAuth(App::getInstance()->getDB());
		$postss=$this->Cave->all();
		$id_exixts=0;
		foreach ($postss as $post):
			if($post->id_ut === $auth->getUserId()){
				$id_exixts=1;
				$id_cave=$post->id_cave;
			}
		endforeach;
		if($id_exixts===0){
			$resut=$this->Cave->create([
				'id_ut'=>$auth->getUserId()
			]);
		}
		if(!empty($_POST)){
			if(empty($_POST['couleur'])){
				$_POST['couleur']="couleur inconnu";
			}
			if(empty($_POST['cepage'])){
				$_POST['cepage']="cepage inconnu";
			}
			if(empty($_POST['nombre_de_bouteille'])){
				$_POST['nombre_de_bouteille']=0;
			}
			if(empty($_POST['annee'])){
				$_POST['annee']=0;
			}
			if(empty($_POST['maturite'])){
				$_POST['maturite']=0;
			}
			if(empty($_POST['num_casier'])){
				$_POST['num_casier']=0;
			}
			if(!empty($_FILES)){
				$file_name=$_FILES['image']['name'];
				$file_tmp_name=$_FILES['image']['tmp_name'];
				$file_extention= strrchr($file_name,".");
				$extensions=array('.bmp','.jpeg','.jpg','.png','.gif','.tiff','.PNG','.JPEG','.JPG','.GIF','.TIFF','.BMP');
				$file_dest='files/'.$file_name;
				if(in_array($file_extention,$extensions)){
					if(move_uploaded_file($file_tmp_name,$file_dest)){
						echo 'image reussie ';
					}else{
						echo 'une erreur est survenue  ';
					}
				}else{
					echo " Seuls les images sont acceptes";
				}
			}
			$result=$this->Vin->create([
				'couleur'=>$_POST['couleur'],
				'cepage'=>$_POST['cepage'],
				'nom'=>$_POST['nom'],
				'nombre_de_bouteille'=>$_POST['nombre_de_bouteille'],
				'maturite'=>$_POST['maturite'],
				'annee'=>$_POST['annee'],
				'num_casier'=>$_POST['num_casier'],
				'file_url'=>$file_dest,
				'image'=>$file_name,
				'id_region'=>$_POST['region'],
				'id_cave'=>$id_cave
			]);
			if($result){
				//$req=$this->Vin->query('Select * FROM vin where vin.nom=?',[$_POST['nom']]);
				$posts=$this->Vin->all();
				$postss=$this->Cave->all();
				$id_exixts=0;
				foreach ($posts as $post):
					if($post->nom === $_POST['nom']){
						$id=$post->id;
					}
				endforeach;
				$resu=$this->Bouteille->create([
					'taille'=>$_POST['taille'],
					'id_vin'=>$id
				]);
				
				
				if(isset($_POST['texte'])&&!(empty($_POST['texte']))){
					$res=$this->Commentaire->create([
						'texte'=>$_POST['texte'],
						'id_vin'=>$id
					]);
				}
				return $this->index();
			}
		}
		$this->loadModel('Bouteille');
		//$categories=$this->Bouteille->extract('id','nomQuestionnaire');
		$form=new BootstrapForm($_POST);
		$this->render('admin.posts.add',compact('form'));
	}

	public function edit(){
		if(!empty($_POST)){
			$result=$this->Vin->update($_GET['id'],[			
				'couleur'=>$_POST['couleur'],
				'cepage'=>$_POST['cepage'],
				'nom'=>$_POST['nom'],
				'nombre_de_bouteille'=>$_POST['nombre_de_bouteille'],
				'maturite'=>$_POST['maturite'],
				'annee'=>$_POST['annee'],
				'num_casier'=>$_POST['num_casier'],
			]);
			
			if($result){
				return $this->index();
			}
		}

		$post=$this->Vin->find($_GET['id']);
		$this->loadModel('Bouteille');
		//$categories=$this->Bouteille->extract('id','nomQuestionnaire');
		$form=new BootstrapForm($post);
		$this->render('admin.posts.edit',compact('categories','form'));
	}	

	
	public function afficher(){
		$affiche=$this->Vin->findVin($_GET['id']);
		$this->render('admin.posts.afficher',compact('affiche'));
	}
	public function delete(){
		if(!empty($_POST)){
			$result=$this->Vin->delete($_POST['id']);
			 return $this->index();
		}
	}
 	
 }
 ?>
