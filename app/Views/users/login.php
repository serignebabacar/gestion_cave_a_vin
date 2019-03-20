
 	<style type="text/css">
      body {padding-top: 20px;}
  </style>
  <script src="jquery.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
  </head>
  <body>
    <div class="container" >      
      <div class="modal fade" id="formulaire">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">x</button>
              <h4 class="modal-title">Vos infos :</h4>
            </div>
            <div class="modal-body">
              	<form action="index.php?p=posts.index" method="post" id="signupForm">
               		 <div class="form-group">
                  		<label for="nom">Nom  </label>
                  		<input type="text" class="form-control" name ="nom" id="nom" placeholder="Votre nom " required >
                	</div>
					<div class="form-group">
						<label for="prenom"> Prenom </label>
						<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre Prenom" required >
					</div>
					<div class="form-group">
						<label for="prenom"> Email </label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Votre EMail" required >
					</div>
					<div class="form-group">
                  		<label for="password" >Mot de passe</label>
                  		<input type="password" class="form-control" name="password" id="password"  required>
                	</div>
					<div class="form-group">
                  		<label for="confirm_password">Confirmer votre mot de passe</label>
                  		<input type="password" class="form-control" name="confirm_password" id="confirm_password" required >
                	</div>
							
						<button type="submit" class="btn btn-default" id="envoie" name="envoyer">Envoyer</button>
							<script>
								$( document ).ready( function () {
									$( "#signupForm" ).validate( {
										rules: {
											nom: "required",
											prenom: {
												required: true,
												minlength: 4
											},
											email: "required",
											password: {
												required: true,
												minlength: 5
											},
											confirm_password: {
												required: true,
												minlength: 5,
												equalTo: "#password"
											},
										
										},
										messages: {
											nom: "champ obligatoire",
											nationalite: "champ obligatoire",
											pseudo: {
												required: "champ obligatoire",
												minlength: "Utilisez 4  caracteres ou plus pour votre mot de passe"
											},
											password: {
												required: "champ obligatoire",
												minlength: "Utilisez 5 caracteres ou plus pour votre mot de passe"
											},
											confirm_password: {
												required: "champ obligatoire",
												minlength: "Utilisez 5 caracteres ou plus pour votre mot de passe",
												equalTo: "Les mots de passe ne correspondent pas. Veuillez réessayer "
											},
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
            <div class="modal-footer">
              <button class="btn btn-info" data-dismiss="modal">Annuler</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  


 </div>
 
 <div class="container" style="background-image:url(http://laurajanedean.com/wp-content/uploads/375/cave-a-vin-joli-rangement-de-vins-en-casiers-muraux.jpg); background-size: 100%; background-repeat: no-repeat; height: 480px">
 <section >	<br><br><br><br><br><br><br><br>
		 

        <div class="row">
				
		   <div class="col-md-4">
                
						
        
     				 </div>
                        <h3 class="panel-title" style="color:white;">Connexion</h3>
					</div>
					
                    <div class="panel-body">
				
						<?php if($errors): ?>
							<div class="alert alert-danger">
								Identifiants incorrects
							</div>
						<?php endif?>
                        <form role="form" method="post">
                            <fieldset>
															
                                <div class="form-group col-md-4 center">
                                    <input class="form-control" placeholder="Email" name="username" type="email" >
                                </div>
                                <div class="form-group col-md-4 center">
                                    <input class="form-control" placeholder="Password" name="password" type="password" >
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
																<button class="btn btn-primary">Sauvegarder</button>
																<a data-toggle="modal"  class="btn btn-primary"  data-backdrop="false" href="#formulaire" style="color:white;">S'inscrire </a>
                            </fieldset>
                   
			</div>
			</section>	
        </div>
    </div>