
 <h1> Administrer les Categories </h1>

<p> 
<a href="?p=admin.categories.add" class="btn btn-success">Ajouter</a>
 </p>
 <div class="panel panel-default">
	<div class="panel-heading">Questionnaires </div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nom Questionnaire</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($items as $categorie): ?>
						<tr>
							<td><?=$categorie->id  ?></td>
							<td><?=$categorie->nomQuestionnaire  ?></td>
							<td>
								<a href="?p=admin.categories.edit&id=<?=$categorie->id  ?> " class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
								<form action="?p=admin.categories.delete" method="post" style="display: inline;">
									<input type="hidden" name="id" value="<?=$categorie->id  ?>">
									<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit"></span></button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>

			</table>
		</div>
	</div>
</div>