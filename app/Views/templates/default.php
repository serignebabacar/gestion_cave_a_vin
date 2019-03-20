<?php 
use Core\Auth\DBAuth;
$auth=new DBAuth(App::getInstance()->getDB());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=App::getInstance()->title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../ico/.ico">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
    <title>Template Bootstrap</title>
   
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Ma CAVE</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Accueil</a></li>
              
                <?php if (!$auth->logged()){
                 ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li><a  href="index.php?p=users.login"><span class="glyphicon glyphicon-log-in"></span>  Connexion</a></li>
                    
                      <?php 
                } ?>
                <?php if ($auth->logged()){
                 ?>
                   <li><a href="index.php?p=admin.posts.index">CREER VOTRE CAVE </a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown"> 
                    <a  data-toggle="dropdown" href="#" style="margin-right: 20" ><span class="glyphicon glyphicon-user"></span> <?=$auth->getUserNom($auth->getUserId()) ?> <b class="caret"></b> </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?="index.php?p=admin.users.edit&id=".$auth->getUserId()?>"><span class="glyphicon glyphicon-edit"></span>  Modifier</a></li>
                       
                        <?php if ($auth->adminLogged()){
                        ?>
                         <li> <a  href="index.php?p=admin.users.index"><span class="glyphicon glyphicon-cog"> </span> Administration </a></li>
                         <?php 
                         } ?>
                       
                        <li class="divider"></li>
                        <li><a href="index.php?p=users.deconnexion"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
                        
                      </ul>

                      <?php 
                       } ?>
             
                </ul>

            </div>
  </div>
</nav>

<div class="container"  >

    <div class="starter-template" style="padding-top:100px; ">
     <?=$content?>
    </div> <!-- /container -->
</div>
</div>

</body>
</html>
