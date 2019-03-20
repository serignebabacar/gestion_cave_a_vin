$(document).ready(function(){
   
    $("#signupForm").submit(function(){
        var nom =$("#nom").val();
        var quantite =$("#nombre_de_bouteille").val();
        var cepage=$("#cepage").val();
        var couleur=$("#couleur").val();
        var maturite=$("#maturite").val();
        var annee=$("#annee").val();
        var volume=$("#taille").val();
        var num_casier=$("#num_casier").val();
        var region=$("#region").val();
        var commentaire=$("#commentaire").val();
        alert("nom :"+nom+"br"+"quantite :"+quantite+"<br> cepage :"+cepage+"<br>");
        $.post('sendAjout.php',{nom:nom,quantite:quantite,cepage:cepage,couleur:couleur,maturite:maturite,annee:annee,num_casier:num_casier,commentaire:commentaire},function(donnees){
            
            $(".retourn").html(donnees).slideDown();
            $("#nom").val('');
            $("#quantite").val('');
            $("#cepage").val('');
        });
        return false;
    });

   // function recupMessages(){
      //  $.post('recup.php',function(data){
         //   $(".afficher").html(data);
        //});
   // }
    //setInterval(recupMessages,1000);
});