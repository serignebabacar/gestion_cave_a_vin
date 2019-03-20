<?php
//connection a la base de données
try{
  $db = new PDO('mysql:hots=localhost;dbname=projet_fin_cycle' ,'root' ,'');
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
  catch(PDOException $e){
     die('Erreur :'. $e->getMessage());
  }
?>
