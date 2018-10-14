function whenSubmit(ck){

	var test=true;

	if(!ck.isValidEmail('email')){
		ck.throwError('email');
		test=false;
	}else{
       ck.removeError('email');
	}if(!ck.isValidPassword('password')){
		ck.throwError('password');
		test=false;
	}else{
      ck.removeError('password');
	}
	return test;
}

function whenBlur(ck,element){

  var idrecup=element.attr('id');

  switch(idrecup){

	   case 'email':
	   if(!ck.isValidEmail('email')){
			ck.throwError('email');
	   }else{
	       ck.removeError('email');
	   }
	   break;

	   case 'password':
	   if(!ck.isValidPassword('password')){
			ck.throwError('password');
	   }else{
	        ck.removeError('password');
	   }
		break;
  }

}

$(function(){

	$('form:eq(0)').submit(function(e){

     var ck=new CheckInputs();
     return whenSubmit(ck);

	});
	$('input').blur(function(e){

     var ck=new CheckInputs();
     whenBlur(ck,$(this));

	})

});