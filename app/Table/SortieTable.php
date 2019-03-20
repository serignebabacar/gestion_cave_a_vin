<?php
namespace App\Table;
use Core\Table\Table;

 class SortieTable extends Table{
 	protected $table='sortie';
 	public function allTable($user){
		return $this->query("
		SELECT vin.nom,sortie.date_sortie,sortie.quantite_sortie
		FROM sortie
		LEFT JOIN vin ON vin.id=sortie.id_vin
		LEFT JOIN cave on cave.id_cave=vin.id_cave
		LEFT JOIN utlisateur on utlisateur.id=cave.id_ut
		WHERE utlisateur.id=?
		ORDER BY sortie.id_sortie DESC ",[$user]);
	}
 }