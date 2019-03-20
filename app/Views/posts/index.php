
<?php


use Core\Table\Table;

$Users=App::getInstance()->getTable("Utlisateur");
 if(isset($_POST["envoyer"])){
    $result=$Users->create([
        'nom'=>$_POST['nom'],
        'prenom'=>$_POST['nom'],
        'email'=>$_POST['email'],
        'mot_pass'=>md5($_POST['password']),
    ]);
        echo '<div class="alert alert-success">
        <strong>Success!</strong> Incription reussie.
        </div>';

} ?>

              <div class="container" style="background-image:url(image_gif.gif); background-size: 60%; background-repeat: no-repeat; height: 550px">
 
 	
                    <div class="row" >

                        <div class="col-lg-8" id="map"  style="width: 800px; height:200px">
                       
                        </div>
             </div>
             </div>
            

							
              
 <footer class="container-fluid bg-4 text-center" style="min-height:50px;">
  <p>Ma Cave  <a href="index.php">Accueil</a></p> 
</footer>
<style>
.bg-4 { 
    background-color: #2f2f2f;
    color: #ffffff;
}
</style>