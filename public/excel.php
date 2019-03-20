<?php

//header("Content-Type: text/csv; charset='utf-8'");
//header("Content-Disposition: attachment; filename=download.csv");
try{
  $db = new PDO('mysql:hots=localhost;dbname=projet_fin_cycle' ,'root' ,'');
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
  catch(PDOException $e){
     die('Erreur :'. $e->getMessage());
  }

 $id=$_POST["id"];
  $sqt = $db->query('SELECT vin.id,vin.couleur,vin.annee,vin.cepage,vin.nom,vin.id_region,bouteille.taille,vin.nombre_de_bouteille,vin.maturite,vin.num_casier
  FROM vin
  LEFT JOIN bouteille ON vin.id_region=bouteille.id_vin
  LEFT JOIN cave on cave.id_cave=vin.id_cave
  LEFT JOIN utlisateur on utlisateur.id=cave.id_ut
  WHERE utlisateur.id='.$id);
  $sqt->execute();
  $resultat = $sqt->fetchAll();
  $resultats = array();
  foreach ($resultat as $d) {
    $resultats[] = array(
      'ID' =>$d->id,
      'COULEUR' =>$d->couleur,
      'ANNEE' =>$d->annee,
      'MATURITE' =>$d->maturite,
      'CEPAGE' =>$d->cepage,
      'NOM VIN' =>$d->nom,
      'CEPAGE' =>$d->cepage,
      'NOMBRE DE BOUTEILLE' =>$d->nombre_de_bouteille,
      );
  }
  require 'class.csv.php';
  CSV::export($resultats,'Export tutoriel');

?>
