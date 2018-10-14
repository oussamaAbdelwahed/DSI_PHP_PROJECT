$(function(){

      $('#first-element').animate({
         'margin-top':'150px'
      },{
      	duration:700,
      });

      $('form:eq(0)').submit(function(e){
        return $('#emailortel').val() !=="";
      });

});