<?php
namespace App\Table;
use Core\Table\Table;

 class EntreeTable extends Table{
 	protected $table='entree';
 	public function allTable($user){
		return $this->query("
		SELECT vin.nom,entree.date_entree,entree.quantite_entree
		FROM entree
		LEFT JOIN vin ON vin.id=entree.id_vin
		LEFT JOIN cave on cave.id_cave=vin.id_cave
		LEFT JOIN utlisateur on utlisateur.id=cave.id_ut
		WHERE utlisateur.id=?
		ORDER BY entree.id_entree DESC ",[$user]);
	}
 }