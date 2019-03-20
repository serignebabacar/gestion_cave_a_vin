<?php
define('ROOT',dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();
use Core\Table\Table;    
    $db=new PDO('mysql:host=localhost;dbname=projet_fin_cycle','root','');
    $Vin=App::getInstance()->getTable("Vin");
    if(isset($_POST["type"],$_POST["quantite"]) && !empty($_POST["quantite"]) && !empty($_POST["type"])){
        $type=htmlspecialchars(trim($_POST["type"]));
        $quantite=htmlspecialchars(trim($_POST["quantite"]));
        $vin=$_POST["vin"];
        $post=$Vin->find($vin);
        if($type=="entree"){
            $nombre=$post->nombre_de_bouteille+$quantite;
            $db->exec("INSERT INTO entree(quantite_entree,id_vin) values ('$quantite','$vin')");
            $result=$Vin->update($vin,[			
                'nombre_de_bouteille'=>$nombre
            ]);
            echo "<div class='alert alert-success'>".$quantite." bouteilles  ont été ajoutées avec succees</div>";
        }else{
            if($type=="sortie"){
                if($post->nombre_de_bouteille<$quantite){
                    echo "<div class='alert alert-danger'> la quantite disponible est insuffisante
                    <br> 
                    vous avez que ".$post->nombre_de_bouteille." bouteilles</div>";
                }else{
                    $db->exec("INSERT INTO sortie(quantite_sortie,id_vin) values ('$quantite','$vin')");
                    $nombre=$post->nombre_de_bouteille-$quantite;
                    $result=$Vin->update($vin,[			
                        'nombre_de_bouteille'=>$nombre
                    ]);
                    echo "<div class='alert alert-success'>".$quantite." bouteille(s)  ont été retirées avec succees</div>";
                }
            }
        }
        
    }else {
        echo "<span class='alert alert-danger'>Veuillez remplir tous les champs </span>";
    }
?>