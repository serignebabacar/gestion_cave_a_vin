
<form method="post">
 	<?= $form->input('nom','Nom '); ?>
	<?= $form->input('prenom','Prenom'); ?>
	<?= $form->input('email','Email'); ?>
	<?= $form->input('mot_pass','mot de passe',['type'=>'password']); ?>
	
 		<button class="btn btn-primary">Sauvegarder</button>
</form>