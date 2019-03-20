<?php
namespace App\Table;
use Core\Table\Table;

 class UtlisateurTable extends Table{
 	protected $table='utlisateur';
 	public function findWithId($id){

		return $this->query("
			SELECT nom_ut
			FROM utlisateur
			WHERE utlisateur.id_ut=?
			",[$id],true);
	}
 }