 var Invitation={};   

 Invitation.sendInvitation=function(invited){
        $.post({
            url:'http://localhost/projetDSI/controller/mains/invitations.php',
            data:'action=inviter&invited='+invited,
            success:function(rep){
                 $('#btninvitation').addClass('sendedinvitation');
                 $('#btninvitation').text('Annuler');
             }
         });  
};


Invitation.getNbrInvitations=function(){
  $.post({
      url:'http://localhost/projetDSI/controller/mains/countinvitations.php',
      data:'action=nbrinvitations',
      success:function(rep){
        if(parseInt(rep)!=0)
           $('#nbrinvitations').text(rep);
      }
  });
};


 Invitation.removeInvitation=function(invited){
        $.post({
            url:'http://localhost/projetDSI/controller/mains/invitations.php',
            data:'action=supprimer&invited='+invited,
            success:function(rep){
                $('#btninvitation').removeClass('sendedinvitation');
                $('#btninvitation').text('Inviter'); 
            }
       });  
 };


 Invitation.doesHeIsInvitedByMe=function(invited){
        $.post({
            url:'http://localhost/projetDSI/controller/mains/invitations.php',
            data:'action=question&invited='+invited,
            success:function(rep){
            if(rep=='true'){
            	$('#btninvitation').text('vous etes amis');
            	$('#btninvitation').attr('disabled','disabled');
            }else if(rep=='false'){
            	$('#btninvitation').addClass('sendedinvitation');
            	$('#btninvitation').text('Annuler');
            }else if(rep=='null'){
                     $('#btninvitation').removeClass('sendedinvitation');
                $('#btninvitation').text('Inviter');
            }else{

            }
        }
       });
              
 };


 Invitation.successListeInvitations=function(rep,placetoappend){
     
      if(rep.length!=0)
 	    var targetAppend=$(placetoappend);
 	    $(targetAppend).empty();
 	for(var i=0;i<rep.length;i++){
 		var elementLi=$('<li style="margin-bottom:20px;margin-top:10px;"></li>');
 		var elementImage=$('<img src="'+rep[i].photo+'" style="height:30px;width:30px;margin-left:10px;">');
 		var elementNomPrenom=$('<strong><a href="sessionfriend.php?id='+rep[i].id_inviter+'"> '+rep[i].nom+' '+rep[i].prenom+'</a></strong>');
 		var towButtons=$('<i class="icon-ok acceptinvi" data="'+rep[i].id_inviter+'" style="font-size:15px;color:green;margin:0px 7px 0px 7px;cursor:pointer;"></i><i class="icon-remove declineinvi" data="'+rep[i].id_inviter+'" style="font-size:15px;color:red;cursor:pointer;"></i>');
 		$(targetAppend).append(elementLi.append(elementImage).append(elementNomPrenom).append(towButtons));

 	}
 };

 Invitation.getListeInvitations=function(placetoappend,callback){
 	$.post({
         url:'http://localhost/projetDSI/controller/mains/invitations.php', 
         data:'action=listeinvitations',
         dataType:'json',
         success:function(rep){
         	if(callback!=null)
         		callback(rep,placetoappend);
         	else
         	  Invitation.successListeInvitations(rep,placetoappend);
         }
 	});
 };


 Invitation.acceptInvitation=function(idinviter,element){
   $.post({
	   	url:'http://localhost/projetDSI/controller/mains/invitations.php',
	   	data:'action=acceptinvi&idinviter='+idinviter,
	   	success:function(rep){
	   		$(element).closest('li').remove();

	   	}
   });
 };


 Invitation.declineInvitation=function(idinviter,element){
	$.post({
	   	url:'http://localhost/projetDSI/controller/mains/invitations.php',
	   	data:'action=declineinvi&idinviter='+idinviter,
	   	success:function(rep){
	   		$(element).closest('li').remove();
	   		
	   	}
	});
 };


$(function(){

   $(document).on('click','.acceptinvi',function(){
     Invitation.acceptInvitation($(this).attr('data'),$(this));

   });

    $(document).on('click','.declineinvi',function(){
         Invitation.declineInvitation($(this).attr('data'),$(this));
    });
});
