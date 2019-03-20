<?php
namespace App\Table;
use Core\Table\Table;

 class RegionTable extends Table{
 	protected $table='region';
 	public function all(){
		return $this->query("
		SELECT region.id_region,region.nom_region
		FROM region
	      ORDER BY region.id_region DESC ");
	}
 }