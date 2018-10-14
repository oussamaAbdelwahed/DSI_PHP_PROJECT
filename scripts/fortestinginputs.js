var CheckInputsPrototypes={

	isEmpty:function(id){
		return $('#'+id).val()=="";
	},

	isValidEmail:function(id){
		var exp=/[a-z1-9-_.]{8,}@[a-z]{4,}[.]{1}[a-z]{2,}/;
		return exp.test($('#'+id).val());
	},

	isValidPassword:function(id){
		var exp=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
		return exp.test($('#'+id).val());
	},

	 areTheSame:function(id1,id2){
	 	return ($('#'+id1).val() == $('#'+id2).val());
	},

	listeJoursHasContent(){
		return $('#jours').val() !=="j";
	},

	listeMoisHasContent(){
		return $('#mois').val() !=="m";
	},

	listeAnneeHasContent(){
		return $('#annee').val() !=="a";
	},

	throwError:function(id){

      var $error=$('#'+id).parent().next();
      if($error.hasClass('error-inputs'))
        $error.show();
      else
        $('#'+id).next().show();
	},

	removeError:function(id){
     
      var $error=$('#'+id).parent().next();
      if($error.hasClass('error-inputs'))
        $error.hide();
      else
        $('#'+id).next().hide();
	},
	trueSexe(){
         return $('input[type="radio"]:checked').val()!=undefined;
	},
	photoSelected(){
		return $('#file').val()!=="";
	}
	
};

function CheckInputs(){

}

CheckInputs.prototype=CheckInputsPrototypes;




