<?php
namespace App\Table;
use Core\Table\Table;

class VinTable extends Table{
	protected $table='vin';
	/**
	*Recupere les derniers articles 
	*@return array
	*/

	public function last(){

		return $this->query("
			SELECT * 
			FROM vin
			
			ORDER BY vin.id DESC");			
	}
	/**
	*Recupere un article en lisant la categorie associée 
	*@param id int
	*@return  App\Entity\PostEntity
	*/

	public function findWithCategorie($id){

		return $this->query("
		SELECT * 
		FROM vin
		WHERE vin.id=?
			",[$id],true);
	}
/**
	*Recupere les derniers articles de la categorie
	*@param category_id int
	*@return array
	*/

	public function afficherVin($category_id){

		return $this->query("
		SELECT vin.id,vin.couleur,vin.cepage,vin.image,vin.nom,vin.id_region,bouteille.taille,vin.nombre_de_bouteille,vin.maturite,vin.num_casier
		FROM vin
		LEFT JOIN bouteille ON vin.id=bouteille.id_vin
		WHERE vin.id=?"
		,[$category_id]);
	}
	public function allTable($id_user){
		return $this->query("
		SELECT vin.id,vin.couleur,vin.cepage,vin.nom,vin.id_region,bouteille.taille,vin.nombre_de_bouteille,vin.maturite,vin.num_casier
		FROM vin
		LEFT JOIN bouteille ON vin.id_region=bouteille.id_vin
		LEFT JOIN cave on cave.id_cave=vin.id_cave
		LEFT JOIN utlisateur on utlisateur.id=cave.id_ut
		WHERE utlisateur.id=?
			ORDER BY vin.id DESC ",[$id_user]);
	}

}