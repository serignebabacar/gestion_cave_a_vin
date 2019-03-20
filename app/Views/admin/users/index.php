
 <h1> Gerer les Utilisateurs </h1>


<div class="panel panel-default">
<!-- Default panel contents -->
	<div class="panel-heading">Utilisateurs </div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<td>PRENOM </td>
						<td>NOM</td>
						<td>EMAIL</td>
						
						<td>ACTION </td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
						<tr>
							<td><?=$user->prenom  ?></td>
							<td><?=$user->nom  ?></td>
							<td><?=$user->email  ?></td>
							
							<td>
								<a href="?p=admin.users.edit&id=<?=$user->id  ?>"  class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
								<form action="?p=admin.users.delete" method="post" style="display: inline;">
									<input type="hidden" name="id" value="<?=$user->id  ?>">
									<a href="?p=admin.users.delete&id=<?=$user->id  ?>" class="btn btn-danger btn-xs" data-confirm="Etes-vous certain de vouloir supprimer?"><span class="glyphicon glyphicon-trash"> </span></a>
								</form>	
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
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