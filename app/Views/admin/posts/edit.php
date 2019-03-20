<?php use Core\Table\Table; ?>
<p></p>

	<div class="col-md-8 col-md-offset-2">
      
			<div class="panel-heading">
				<form method="post" enctype="multipart/form-data"id="signupForm">
					<div class="form-row">
						<div class="form-group col-md-6">
     						<?= $form->input('couleur','La Couleur'); ?>
    					</div>
						<div class="form-group col-md-6">
			 				 <?= $form->input('cepage','Cepage'); ?>
    					</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<?= $form->input('nom','Nom'); ?>
    					</div>
						<div class="form-group col-md-6">
						<div class="form-group">
							<label for="prenom"> Region </label>
							<select name="region" id="region"  class="form-control" >
								<?php 
									$Region=App::getInstance()->getTable("Region");
									$listes=$Region->all();
									foreach ($listes as $post): ?>
										<option value="<?=$post->id_region;?>"><?=$post->nom_region;?>
										</option>
										<?php endforeach; ?>
														</select>
												</div>
    					</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<?= $form->input('nombre_de_bouteille','Nombre de Bouteille'); ?>
    					</div>
						<div class="form-group col-md-3">
							<?= $form->input('maturite','Maturité'); ?>
						</div>
						<div class="form-group col-md-3">
							<?= $form->input('annee','Annee'); ?>
						</div>
						<div class="form-group col-md-3">
							<label for="">Volume</label>
							<select name="taille" id="" class="form-control">
								<option value="20">20 cl</option>
								<option value="75">75 cl</option>
								<option value="50">50 cl</option>
								<option value="9">6 cl</option>
								<option value="12">12 cl</option>
								<option value="15">15 cl</option>
							</select> 
						</div>
						<div class="form-group col-md-4">
							<?= $form->input('num_casier','Numero de la casier'); ?>
						</div>
					</div>
					
						<div class="form-group col-md-8">
							<label for="inputNumero">Cliquez Pour charger une image </label>
							<input type="file" class="form-control" name="image" >
						</div>
					
					<div class="form-group col-md-12">
						<label for="textarea">Votre Commentaire :</label>
               		 	<textarea id="textarea" class="form-control" rows="3" name="texte" ></textarea>
					</div>
						<div class="form-group col-md-12">
							<button class="btn btn-primary" name="sauvegarder">Sauvegarder</button>
						</div>
					
 				</form>
			</div>
		</div>
	</div>			