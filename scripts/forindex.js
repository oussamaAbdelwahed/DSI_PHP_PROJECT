var AnimateMasque={};

AnimateMasque.setOpacity=function($op,$dur){

	$('#masque').animate({
	   'background-color': 'rgba(24,26,25,'+$op+')'
	},{
	   duration:parseInt($dur),
	});
}

	
$(function(){

		$("input").focus(function(e){
			AnimateMasque.setOpacity(0,1000);
		});

		$("input").blur(function(e){
			AnimateMasque.setOpacity(0.7,1000);
		});

});