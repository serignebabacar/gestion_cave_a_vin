<?php
// exporter les données de la bas de données en fichiers excels
class CSV{
  static function export($resultats, $filename){
    header("Content-Type: text/csv; charset='utf-8'");
    header('Content-Disposition: attachment; filename="'.$filename.'.csv"');
    $i=0;
    foreach($resultats as $v) {
      if($i==0){
        echo '"'.implode('";"',array_keys($v)).'"'."\n";
      }
      echo '"'.implode('";"',$v).'"'."\n";
      $i++;
    }
  }
}
?>
