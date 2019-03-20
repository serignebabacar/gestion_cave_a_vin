<?php use Core\Table\Table;
use Core\Auth\DBAuth;
$auth=new DBAuth(App::getInstance()->getDB());
?>
<p></p>
<script src="scriptProjet.js"></script>
<div class="form-group">
<form action="" method="post" style="display: inline;">
        
        <input type="search"  placeholder="nom vin, annee, couleur,cepage,"name="query" maxlength="80" size="80" id="query" />
        <input type="submit" name="filtre"  class="btn btn-success"  value="Rechercher">
      </form>
</div>
<a href="?p=admin.posts.add" class="btn btn-success">Ajouter Un Vin</a>
<form action="excel.php" method="post" style="display: inline;">
									<input type="hidden" name="id" value="<?=$auth->getUserId()?>">
								<button class="btn btn-success" class="glyphicon glyphicon-floppy-save" >Exporter en Excel </button>	
								</form>
<a data-toggle="modal" data-backdrop="false" href="#formulaire"  class="btn btn-success">Entree/Sortie </a>
<div class="container">      
    <div class="modal fade" id="formulaire">
        <div class="modal-dialog">
          	<div class="modal-content">
								<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">x</button>
										<h4 class="modal-title">Informations :</h4>
								</div>
            		<div class="modal-body">
										<form action="index.php?p=users.login" method="post" id="signupForm">
												<div class="form-group">
														<label for="nom">Type  </label>
														<select name="entre_sortie" id="type"  class="form-control" >
																<option value=""></option>
																<option value="entree"  class="form-control" >Entrée</option>
																<option value="sortie"  class="form-control" >Sortie</option>
														</select>
								
												</div>
												<div class="form-group">
														<label for="prenom"> Vin </label>
														<select name="vin" id="vin"  class="form-control" >
																<?php 
																	$Vin=App::getInstance()->getTable("Vin");
																	$listes=$this->Vin->allTable($auth->getUserId());
																	
																	foreach ($listes as $post): ?>
																			<option value="<?=$post->id;?>"><?=$post->nom;?></option>
																			<?php endforeach; ?>
														</select>
												</div>
												<div class="form-group">
														<label for="prenom"> Quantite </label>
														<input type="text" class="form-control" name="email" id="quantite" placeholder="Quantite" required >
												</div>
												<div class="retourn"></div>
														<button type="submit" class="btn btn-default" id="enregistrer" name="envoyer">Envoyer</button>
										</form>
            		</div>
            		<div class="modal-footer">
              			<button class="btn btn-info" data-dismiss="modal">Annuler</button>
            		</div>
          	</div>
        </div>
      </div>
    
  
<p></p>
<div class="row" >
<?php
// initialisation de la variable contenant des resulats de la recherche
$resultats="";
$sql="";
$nombreParametre = 2; // Nombre de parametre renseigné
// traitement de la requete
 if(isset($_POST['query']) && !empty($_POST['query'])){
		// si l'utilisateur a entré quelque chose on traite sa requete
		
        $query = preg_replace("#[^a-zA-Z ?0-9]#i" ,"", $_POST['query']);
  // tous ce qui ressemble pas a la lettre a jusqu'a z , espace ,point d'interrogation de 0 a 9 sera remplacé par vide
        if($_POST['filtre']) {
          $sql = 'SELECT * 
		  	FROM vin 
			  LEFT JOIN cave on vin.id_cave=cave.id_cave
			  LEFT JOIN utlisateur ON utlisateur.id=cave.id_ut
			   WHERE ( couleur LIKE ? OR vin.nom LIKE ? OR vin.cepage LIKE ? OR vin.annee LIKE ? ) AND utlisateur.id=?';
        }
        // connexion a la base de données
        include("connect_db.php");
        $req = $db->prepare($sql);
        if($nombreParametre == 2){
        $req->execute(array('%'.$query.'%','%'.$query.'%','%'.$query.'%','%'.$query.'%',$auth->getUserId()));
      }
        $count= $req->rowCount();
		$count= $req->rowCount();
        if($count >= 1){
           echo " $count resultats trouvés pour <strong>$query</strong><hr/>";
			// afficher le resultats a l'ecran
			?>
			<table class="table">
												<thead>
														<tr>
																<td>Couleur</td>
																<td>Cépage</td>
																<td>Nom</td>
																<td>Nombre De Bouteille</td>
																<td>Maturite</td>
																<td>Numero Casier</td>
																<td>Actions</td>
														</tr>
											</thead>
											<tbody>
								<?php

            while($data= $req->fetch(PDO::FETCH_OBJ)){
              //echo '#'.$data->id. ' - Dommaine: '.$data->cepage. ' - Annee: '.$data->annee. ' - Couleur: '.$data->couleur. ' - Cuvee: '.$data->nom. ' - Cepage: '.$data->cepage;
              //echo '#'.$data->id_bouteille. ' - Titre: '.$data->title;
			
			?>
			
													
				<tr>
																	<td><?=$data->couleur  ?></td>
																	<td><?=$data->cepage  ?></td>
																	<td><?=$data->nom  ?></td>
																	<td><?=$data->nombre_de_bouteille  ?></td>
																	<td><?=$data->maturite  ?></td>
																	<td><?=$data->num_casier  ?></td>
																	<td>
																		<a href="?p=admin.posts.edit&id=<?=$post->id  ?>"class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit">modifier</span></a>
																		<form action="?p=admin.posts.delete" method="post" style="display: inline;">
																			<input type="hidden" name="id" value="<?=$post->id  ?>">
																			<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash">supprimer</span></button>
																		</form>
																		<a href="?p=admin.posts.afficher&id=<?=$post->id  ?>"class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus-sign">Afficher</span></a>
															</td>
																</tr>
													<?php
													}?>
												</tbody>
										</table>
			
										<?php
			
        } else
        echo "0 resultats trouvé pour <strong>$query</strong><hr/>";
 
 }else{
	?>
	
 	
        <section class="col-sm-12">
						<ul class="nav nav-pills">
								<li class="active"><a href="#stock" data-toggle="tab" class="btn btn-success">STOCK</a></li>
								<li><a href="#epuise" data-toggle="tab" class="btn btn-success">EPUISE</a></li>
								<li><a href="#historique_entree" data-toggle="tab" class="btn btn-success">Historique Entrée</a></li>
								<li><a href="#historique_sortie" data-toggle="tab" class="btn btn-success">Historique Sortie</a></li>
								
						</ul>
						<div class="tab-content" style="min-height:500px">
								<div class="tab-pane active fade in" id="stock">
								<div class="well">
										<table class="table">
												<thead>
														<tr>
																<td>Couleur</td>
																<td>Cépage</td>
																<td>Nom</td>
																<td>Nombre De Bouteille</td>
																<td>Maturite</td>
																<td>Numero Casier</td>
																<td>Actions</td>
														</tr>
											</thead>
											<tbody>
													<?php foreach ($posts as $post): ?>
															<tr>
																	<td><?=$post->couleur  ?></td>
																	<td><?=$post->cepage  ?></td>
																	<td><?=$post->nom  ?></td>
																	<td><?=$post->nombre_de_bouteille  ?></td>
																	<td><?=$post->maturite  ?></td>
																	<td><?=$post->num_casier  ?></td>
																	<td>
																		<a href="?p=admin.posts.edit&id=<?=$post->id  ?>"class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit">modifier</span></a>
																		<form action="?p=admin.posts.delete" method="post" style="display: inline;">
																			<input type="hidden" name="id" value="<?=$post->id  ?>">
																			<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash">supprimer</span></button>
																		</form>
																		<a href="?p=admin.posts.afficher&id=<?=$post->id  ?>"class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus-sign">Afficher</span></a>
															</td>
																</tr>
													<?php endforeach; ?>
												</tbody>
										</table>
										</div>
						</div>
						<div class="tab-pane fade" id="epuise">
              <div class="well">
					
			<table class="table">
				<thead>
					<tr>
						<td>Couleur</td>
						<td>Cépage</td>
						<td>Nom</td>
						<td>Nombre De Bouteille</td>
						<td>Maturite</td>
						<td>Numero Casier</td>
						<td>Actions</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($posts as $post):
						if($post->nombre_de_bouteille == 0){ ?>
									<tr>
									<td><?=$post->couleur  ?></td>
									<td><?=$post->cepage  ?></td>
									<td><?=$post->nom  ?></td>
									<td><?=$post->nombre_de_bouteille  ?></td>
									<td><?=$post->maturite  ?></td>-
									<td><?=$post->num_casier  ?></td>
									<td>
										<a href="?p=admin.posts.edit&id=<?=$post->id  ?>"class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit">modifier</span></a>
										<form action="?p=admin.posts.delete" method="post" style="display: inline;">
											<input type="hidden" name="id" value="<?=$post->id  ?>">
											<a href="?p=admin.posts.delete&id=<?=$post->id  ?>"class="btn btn-success btn-xs" onclick='return  confirm("etes vous sur de vouloir supprimer");'><span class="glyphicon glyphicon-edit">supprimer</span></a>
										</form>
										
									</td>
					</tr>
					<?php
						} ?>
					<?php endforeach; ?>
						
					
				</tbody>
			</table>
		</div>
	
            </div>
			<div class="tab-pane fade" id="historique_sortie">
              <div class="well">
					
			  <table class="table">
				<thead>
					<tr>
						<td>VIN</td>
						<td>QUANTITE</td>
						<td>DATE</td>
					</tr>
				</thead>
				<tbody>			
					<?php foreach ($sorties as $post):
				
						 ?>
									<tr>
									<td><?=$post->nom  ?></td>
									<td><?=$post->quantite_sortie  ?></td>
									<td><?=$post->date_sortie  ?></td>
									
								
					</tr>
					
					<?php endforeach; ?>
						
					
				</tbody>
			</table>
		</div>
	
            </div>
			<div class="tab-pane fade" id="historique_entree">
              <div class="well">
					
			<table class="table">
				<thead>
					<tr>
						<td>VIN</td>
						<td>QUANTITE</td>
						<td>DATE</td>
					</tr>
				</thead>
				<tbody>			
					<?php foreach ($entrees as $post):
				
						 ?>
									<tr>
									<td><?=$post->nom  ?></td>
									<td><?=$post->quantite_entree  ?></td>
									<td><?=$post->date_entree  ?></td>
									
								
					</tr>
					
					<?php endforeach; ?>
						
					
				</tbody>
			</table>
		</div>
	
			</div>
			<div class="tab-pane fade" id="recherche">
              <div class="well">
					
			<table class="table">
				<thead>
					<tr>
						<td>VIN</td>
						<td>QUANTITE</td>
						<td>DATE</td>
					</tr>
				</thead>
				<tbody>			
					<?php foreach ($entrees as $post):
				
						 ?>
									<tr>
									<td><?=$post->nom  ?></td>
									<td><?=$post->quantite_entree  ?></td>
									<td><?=$post->date_entree  ?></td>
									
								
					</tr>
					
					<?php endforeach; ?>
						
					
				</tbody>
			</table>
		</div>
	
            </div>
          </div>
        </section>
		<?php
 }
 ?>     
<style>
.bg-4 { 
    background-color: #2f2f2f;
    color: #ffffff;
}
</style>

<footer class="container-fluid bg-4 text-center">
  <p> COPYRIGHT © L3 INFO G7</p> 
</footer>
