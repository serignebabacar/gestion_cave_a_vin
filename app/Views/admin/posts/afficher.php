<div class="container">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-default">
                <div class="row" >
                    <div class="col-lg-8"  style="width:300px; height:200px">
                        <?php echo '<img height="400" width="300" src="'.$affiche->file_url.'">';?>
                    </div>
            
                <div class="col-lg-7">
                    <article name="données" >
                    <ul>
                        <li><h3>appelation :<?= $affiche->nom?></h3></li>
                        <?php echo '<br>';?>
                        <li><h3>Reste <?= $affiche->nombre_de_bouteille?> Bouteille(s)</h3></li>
                        <?php echo '<br>';?>

                        <li><h3>Cepage  <?= $affiche->cepage?></h3></li>
                        <?php echo '<br>';?>
                        <li><h3>Format  <?= $affiche->taille?></h3></li>
                        <?php echo '<br>';?>
                        <li><h3>Couleur  <?= $affiche->couleur?></h3></li>
                        <?php echo '<br>';?>
                        <li><h3>A Boire de   <?= $affiche->annee?> à <?= $affiche->maturite?> </h3></li>
                        <li><h3> <a class="lienpetitgris" target="_blank" href="http://www.google.fr/search?hl=fr&amp;q=<?= $affiche->nom?>&amp;btnG=Recherche+Google">Rechercher ce vin sur Google</a></h3></li>
                    </ul>
                    </article> 
                </div>    
            </div>
        </div>
    </div>
    <a href="?p=admin.posts.edit&id=<?=$_GET['id']  ?>"class="btn btn-success "><span class="glyphicon glyphicon-edit">modifier</span></a>
    <form action="?p=admin.posts.delete" method="post" style="display: inline;">
		<input type="hidden" name="id" value="<?=$_GET['id']   ?>">
		<a href="?p=admin.posts.delete&id=<?=$_GET['id']?>" class="btn btn-danger btn-xs" data-confirm="Etes-vous certain de vouloir supprimer?"><span class="glyphicon glyphicon-trash"> </span></a>
	</form>	</div>
    <script>
		$(function() {
		$('a[data-confirm]').click(function(ev) {
			var href = $(this).attr('href');
			
			if (!$('#dataConfirmModal').length) {
				$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Merci de confirmer</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
			}
			$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
			$('#dataConfirmOK').attr('href', href);
			$('#dataConfirmModal').modal({show:true});
			
			return false;
		});
	});
	</script>