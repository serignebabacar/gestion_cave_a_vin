$(function() {
    $("#submit").click(function(){
      estValide = true;
        if($("#nom").val()==""){
          $("#nom").css('border-color','#ff0000')
          estValide = false;
        }
      return estValide;
    });
  });