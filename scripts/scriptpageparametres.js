var Parametres={};


Parametres.ajaxToUpdateSimpleInformations=function(fieldName,fieldValue,$clickedElement){
	$.post({
		   url:'http://localhost/projetDSI/controller/mains/updateaccountinformations.php',
		   data:fieldName+"="+fieldValue,
		   success:function(rep){
             $($clickedElement).css('color','green');
             $($clickedElement).closest("td").prev().replaceWith("<td class='data'>"+rep+"</td>");
		   }
	});
};



Parametres.ajaxToUpdatePassword=function(fieldValue,$clickedElement){
	$.post({
		   url:'http://localhost/projetDSI/controller/mains/updateaccountinformations.php',
		   data:"password="+fieldValue,
		   success:function(rep){
             $($clickedElement).css('color','green');
             $($clickedElement).closest('td').prev().find("#password").val("");
		   }
	});
};

Parametres.ajaxForSex=function(fieldValue,$clickedElement){
	$.post({
		   url:'http://localhost/projetDSI/controller/mains/updateaccountinformations.php',
		   data:"sex="+fieldValue,
		   success:function(rep){
             $($clickedElement).css('color','green');
		   }
	});
};
Parametres.ajaxForBirthday=function(fieldValue,$clickedElement){
	$.post({
		   url:'http://localhost/projetDSI/controller/mains/updateaccountinformations.php',
		   data:"birthday="+fieldValue,
		   success:function(rep){
             $($clickedElement).css('color','green');
		   }
	});
};


$(function(){

		$('#showpassword').mousedown(function(e){
		  $(this).prev().attr('type','text');
		});

		$('#showpassword').mouseup(function(e){
		  $(this).prev().attr('type','password');
		});

		$('.edittext').click(function(){
		  var content=$(this).closest('td').prev().text();
		  $(this).closest('td').prev().replaceWith('<input type="text" class="upd" name="newnom" id="newnom" value="'+content+'">').css('outline','none').css('border','none').focus();
		});


		$('.validtext').click(function(e){
			var content=null;
			if($(this).closest('td').prev().hasClass('upd'))
				content=$(this).closest('td').prev().val();
			else
				content=$(this).closest('td').prev().text();

			Parametres.ajaxToUpdateSimpleInformations($(this).attr('data'),content,$(this));
		});


		$('.validpassword').click(function(){
				var content=$(this).closest('td').prev().find("#password").val();
				var exp=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
		        if(exp.test(content)){
                   $(this).closest('td').prev().find("#password").css('border','unset');
                   $('#erpass').text(" ");
                   Parametres.ajaxToUpdatePassword(content,$(this));
		         }else{
		         	$(this).closest('td').prev().find("#password").css('border','solid 1px red');
		         	$('#erpass').text('mot de passe doit contenir au moins une lettre majuscule et un chiffre');
		         }
		});

		$('.validsex').click(function(){
			var sex=$("#forsex").val();
			Parametres.ajaxForSex(sex,$(this));
		});

	    $('.validbirthday').click(function(){
	    	var birthday=$("#annee").val()+"-"+$("#mois").val()+"-"+$("#jours").val();
			Parametres.ajaxForBirthday(birthday,$(this));
		});

		$('.validimage').click(function(){
			var element=$(this);
			var form=new FormData(document.querySelector("form"));
		    $.ajax({
		    	type:"POST",
		    	url:'http://localhost/projetDSI/controller/mains/updateaccountinformations.php',
		    	data:form,
		    	processData:false,
		    	contentType:false,
		    	success:function(rep){
		    	 $(element).css('color','green');
                 $(element).closest('td').prev().find('#re').attr('src',rep);
		    	}
		    });
		});

});