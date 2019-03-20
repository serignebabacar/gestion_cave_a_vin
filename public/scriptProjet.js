$(document).ready(function(){

    $("#signupForm").submit(function(){
        var type =$("#type").val();
        
        var quantite =$("#quantite").val();
        var vin=$("#vin").val();
      
        $.post('sendProjet.php',{type:type,quantite:quantite,vin:vin},function(donnees){
            
            $(".retourn").html(donnees).slideDown();
            $("#type").val('');
            $("#quantite").val('');
            $("#vin").val('');
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