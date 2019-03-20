<?php use Core\Table\Table; ?>
<p></p>

<script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
	<div class="col-md-8 col-md-offset-2">
      
			<div class="panel-heading">
				<form method="post" enctype="multipart/form-data" id="signupForm">
					<div class="form-row">
						<div class="form-group col-md-6">
                             <label for="couleur"> Couleur </label>
							 <input type="text" class="form-control" name="couleur" id="couleur" placeholder="Couleur"  >
    					</div>
						<div class="form-group col-md-6">
                              
                              <label for="cepage"> Cepage </label>
							 <input type="text" class="form-control" name="cepage" id="cepage" placeholder="cepage"  >
    					
    					</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
						<label for="couleur"> Nom </label>
							 <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom du Vin"  >
    					
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
                            <label for="nombre">Nombre de Bouteille </label>
							 <input type="text" class="form-control" name="nombre_de_bouteille" id="nombre_de_bouteille" >
    					
    					</div>
						<div class="form-group col-md-3">
                           
                            <label for="maturite">Maturite </label>
							 <input type="text" class="form-control" name="maturite" id="maturite"  >
    					
						</div>
						<div class="form-group col-md-3">
                        <label for="annee">Année</label>
						 <input type="text" class="form-control" name="annee" id="annee"  >
    					
						</div>
						<div class="form-group col-md-3">
							<label for="">Volume</label>
							<select name="taille" id="taille" class="form-control">
								<option value="20">20 cl</option>
								<option value="75">75 cl</option>
								<option value="50">50 cl</option>
								<option value="9">6 cl</option>
								<option value="12">12 cl</option>
								<option value="15">15 cl</option>
							</select> 
						</div>
						<div class="form-group col-md-4">
							<label for="annee">Numero Casier</label>
						 <input type="text" class="form-control" name="num_casier" id="num_casier" >
    					
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
                        <div class="retourn">
                            
                        </div>
						<div class="form-group col-md-12">
							<button class="btn btn-primary" name="sauvegarder">Sauvegarder</button>
						</div>
						<script>
								$( document ).ready( function () {
									$( "#signupForm" ).validate( {
										rules: {
											nom: "required",
											nombre_de_bouteille: {
											number: true
											},
											num_casier: {
											number: true
											},
											annee: {
											number: true
											},
											maturite: {
											number: true
											}
										
										},
										messages: {
											nom: "champ obligatoire",
											nombre_de_bouteille: " veuillez saisir un nombre valide",
											maturite: " veuillez saisir un nombre valide",
											num_casier: " veuillez saisir un nombre valide",
											annee: " veuillez saisir un nombre valide"
										},
										errorElement: "em",
										errorPlacement: function ( error, element ) {
											// Add the `help-block` class to the error element
											error.addClass( "help-block" );

											if ( element.prop( "type" ) === "checkbox" ) {
												error.insertAfter( element.parent( "label" ) );
											} else {
												error.insertAfter( element );
											}
										},
										highlight: function ( element, errorClass, validClass ) {
											$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
										},
										unhighlight: function (element, errorClass, validClass) {
											$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
										}
									} );

									
								} );
							
								</script>
 				</form>
			</div>
		</div>
	</div>			