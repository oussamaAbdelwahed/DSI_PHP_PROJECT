function testingWhenSubmitting(ck){

	var test=true;
	if(ck.isEmpty('nom')){
		ck.throwError('nom');
		test=false;
	}else{
		ck.removeError('nom');
	}if(ck.isEmpty('prenom')){
		ck.throwError('prenom');
		test=false;
	}else{
        ck.removeError('prenom');
	}if(!ck.isValidEmail('email')){
		ck.throwError('email');
		test=false;
	}else{
          ck.removeError('email');
	}if(!ck.isValidPassword('password')){
		ck.throwError('password');
		test=false;
	}else{
        ck.removeError('password');
	}if(!ck.areTheSame("password",'confpassword')){
		ck.throwError('confpassword');
		test=false;
	}else{
		ck.removeError('confpassword');
	}if(!ck.trueSexe()){
		test=false;
		$('#errors').show();
	}else{
		$('#errors').hide();
	}if(ck.listeJoursHasContent() || ck.listeMoisHasContent() || ck.listeAnneeHasContent()){
          if(!ck.listeJoursHasContent() || !ck.listeMoisHasContent() || !ck.listeAnneeHasContent()){
          	 test=false;
          	 $('#errordn').show();
          }else{
          	 $('#errordn').hide();
          }
	}else{
         $('#errordn').hide();
	}if(!ck.photoSelected()){
		test=false;
		ck.throwError('file');
	}else{
		ck.removeError('file');
	}
	return test;
}


function testingWhenBlur(ck,element){

	var idRecup=element.attr('id');

	switch(idRecup){

	      case "nom":
	       if(ck.isEmpty('nom')) ck.throwError('nom');
	       else ck.removeError('nom');
	      break;
	     case "prenom":
	      if(ck.isEmpty('prenom')) ck.throwError('prenom');
	      else ck.removeError('prenom');
	      break;

	     case "email":
	       if(!ck.isValidEmail('email')) {ck.throwError('email');}
	       else {ck.removeError('email');}
	      break;

	      case "password":
	      if(!ck.isValidPassword('password')) {ck.throwError('password');}
	      else {ck.removeError('password');}

	      break;

	      case "confpassword":
	      if(!ck.areTheSame("password",'confpassword')){ck.throwError('confpassword');}
	      else {ck.removeError('confpassword');}
	      break;
	}

}

$(function(){

	$('form:eq(0)').submit(function(e){
      var ck=new CheckInputs();
      return testingWhenSubmitting(ck);
	});

	$('input').blur(function(){
      var ck=new CheckInputs();
        testingWhenBlur(ck,$(this));

	});

});