<?php
define('ROOT',dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();
use Core\Table\Table;    
    $db=new PDO('mysql:host=localhost;dbname=projet_fin_cycle','root','');
    $Vin=App::getInstance()->getTable("Vin");
    if(isset($_POST["couleur"],$_POST["nom"],$_POST["quantite"],$_POST["cepage"],$_POST["maturite"],$_POST["annee"],$_POST["num_casier"]) 
        && !empty($_POST["quantite"]) && !empty($_POST["nom"]) && !empty($_POST["couleur"])&& !empty($_POST["maturite"])&& !empty($_POST["cepage"])
        && !empty($_POST["annee"])&& !empty($_POST["num_caiser"])){
        echo "<span class='alert alert-success'>champs bien remplis </span>";
        $nom=htmlspecialchars(trim($_POST["nom"]));
        $quantite=htmlspecialchars(trim($_POST["quantite"]));
        $couleur=$_POST["couleur"];
        $cepage=$_POST["cepage"];
        $maturite=$_POST["maturite"];
        $annee=$_POST["annee"];
        $num_casier=$_POST["num_casier"];
        $commentaire=$_POST["commentaire"];
        if(!empty($_FILES)){
            $file_name=$_FILES['image']['name'];
            $file_tmp_name=$_FILES['image']['tmp_name'];
            $file_extention= strrchr($file_name,".");
            $extensions=array('.bmp','.jpeg','.jpg','.png','.gif','.tiff','.PNG','.JPEG','.JPG','.GIF','.TIFF','.BMP');
            $file_dest='files/'.$file_name;
            if(in_array($file_extention,$extensions)){
                if(move_uploaded_file($file_tmp_name,$file_dest)){
                    echo 'image reussie ';
                }else{
                    echo 'une erreur est survenue  ';
                }
            }else{
                echo " Seuls les images sont acceptes";
            }
        }
        $post=$Vin->find($vin);
        
        
    }else {
        echo "<span class='alert alert-danger'>Veuillez remplir tous les champs </span>";
    }
?>