function getCurrentDate(){

	var d=new Date();
	var year=d.getFullYear();
	var month=parseInt(d.getMonth())+1;
	var day="0"+d.getDay();

	return year+"-"+month+"-"+day+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();	
}



function createImage(response){

   var imageuser=$("<img alt='utilisateur' class='userpostimage'/><strong class='nomutilisateru'>"+$('#prenom').val()+"</strong>").attr('src',
	$("#imageposter").attr('src')
	   );

   var originalRow=$('<div class="row parentimage"></div>');
   var imageContainer=$('<div class="col-xs-12 statuscon"></div>').attr('id',$('#id_poster').val());
   var row1=$("<div class='row'></div>");
   row1.append(imageuser);
   var Image=$('<p class="titleanypost titleimage">'+$('#titre').val()+'</p><img id="'+response['id']+'" class="imageinapost" src="'+response['url']+'">');
   row1.append("<small class='datepostpost pull-right' >"+getCurrentDate()+"</small><hr class='hrpost'>");
   var row2=$("<div class='row'></div>");
   row2.append(Image);
   var rowLikesComments=$('<div class="nbrlikescomments"><small class="fornbrlikes"></small><small class="fornbrcomments"></small></div>');
   var row3=$('<div class="row" id="bottomofpost"><i class="icon-thumbs-up likecomment likeimage" type="image_post"></i><i class="icon-comments likecomment commentimage"></i><i  class="icon-edit modifpostimage pull-right" onclick="EditingPostsView.editImage(event.target);"></i><i data-toggle="modal" type="image_post" data-target="#myModal" class="icon-trash modifpost deletepostimage pull-right"></i></div>');
   imageContainer.append(row1).append(row2).append(row3.prepend(rowLikesComments));
      var formcommenter=$('<form class="form-inline col-xs-12 formcommenter" method="POST"><div  class="form-group  col-xs-9 col-lg-9"><img src="'+ $("#imageposter").attr("src")+'" style="height:31px;width:34px;margin-right:14px;margin-bottom:4px;"><input type="text" name="commenterfield" id="commenterfield" class="commenterfield"></div><button id="buttonsubmitcommenter" class="btn btn-default col-xs-3 col-lg-3 buttonsubmitcommenter buttonsubmitcommenterimage" ><span class="glyphicon glyphicon-send"></span></button></form>');
   var $divcommenter=$('<div class="divcommenters"></div>');
    originalRow.append(imageContainer).append($divcommenter.append(formcommenter));
    $("#profilecontent").prepend(originalRow);
}


function createVideo(response){

	  var imageuser=$("<img alt='utilisateur' class='userpostimage'/><strong class='nomutilisateru'>"+$('#prenom').val()+"</strong>").attr('src',
		$("#imageposter").attr('src')
	   );
    
      var originalRow=$('<div class="row parentvideo"></div>');
      var videoContainer=$('<div class="col-xs-12  statuscon"></div>').attr('id',$('#id_poster').val());
      var row1=$("<div class='row'></div>");
      row1.append(imageuser);
      var video=$('<p class="titleanypost titlevideo">'+$('#titre').val()+'</p><video id="'+response['id']+'" class="videoinapost"  controls><source controls type="video/mp4" src="'+response['url']+'"></source></video>');
      row1.append("<p class='datepostpost pull-right' >"+getCurrentDate()+"</p><hr class='hrpost'>");
      var row2=$("<div class='row'></div>");
      row2.append(video);
  var rowLikesComments=$('<div class="nbrlikescomments"><small class="fornbrlikes"></small><small class="fornbrcomments"></small></div>');
      var row3=$('<div class="row" id="bottomofpost"><i class="icon-thumbs-up likecomment likevideo" type="video_post"></i><i class="icon-comments likecomment commentvideo"></i><i class="icon-edit modifpostvideo pull-right" onclick="EditingPostsView.editVideo(event.target);"></i><i data-toggle="modal" type="video_post" data-target="#myModal" class="icon-trash modifpost deletepostvideo pull-right"></i></div>');
      videoContainer.append(row1).append(row2).append(row3.prepend(rowLikesComments));
      var formcommenter=$('<form class="form-inline col-xs-12 formcommenter" method="POST"><div  class="form-group  col-xs-9 col-lg-9"><img src="'+ $("#imageposter").attr("src")+'" style="height:31px;width:34px;margin-right:14px;margin-bottom:4px;"><input type="text" name="commenterfield" id="commenterfield" class="commenterfield"></div><button id="buttonsubmitcommenter" class="btn btn-default col-xs-3 col-lg-3 buttonsubmitcommenter buttonsubmitcommentervideo" ><span class="glyphicon glyphicon-send"></span></button></form>');
   var $divcommenter=$('<div class="divcommenters"></div>');
      originalRow.append(videoContainer).append($divcommenter.append(formcommenter));
    $("#profilecontent").prepend(originalRow);
}


function createStatus(response){

	    var imageuser=$("<img alt='utilisateur' class='userpostimage'/><strong class='nomutilisateru'>"+$('#prenom').val()+"</strong>").attr('src',
		$("#imageposter").attr('src')
	    );

	      var originalRow=$('<div class="row parentstatus"></div>');
        var statusContainer=$('<div class=" col-xs-12  statuscon"></div>').attr('id',$('#id_poster').val());
        var paragrapheStatus=$('<p id="'+response['id']+'" class="contentstatus text-center">'+$("#statusfield").val()+'</p>');
        var row1=$("<div class='row'></div>");
        row1.append(imageuser);
        row1.append("<span class='datepostpost pull-right'>"+getCurrentDate()+"</span><hr class='hrpost'>");
        var row2=$("<div class='row'></div>");
        row2.append(paragrapheStatus);
        var row3=$('<div class="row" id="bottomofpost"><i class="icon-thumbs-up likecomment likestatus" type="status_post"></i><i class="icon-comments likecomment commentstatus"></i><i class="icon-edit modifpoststatus  pull-right" onclick="EditingPostsView.editStatus(event.target);"></i><i type="status_post" data-toggle="modal" data-target="#myModal" class="icon-trash modifpost deletepoststatus pull-right"></i></div>');
       var rowLikesComments=$('<div class="nbrlikescomments"><small class="fornbrlikes"></small><small class="fornbrcomments"></small></div>');
        statusContainer.append(row1).append(row2).append(row3.prepend(rowLikesComments));
         var formcommenter=$('<form class="form-inline col-xs-12 formcommenter" method="POST"><div  class="form-group  col-xs-9 col-lg-9"><img src="'+ $("#imageposter").attr("src")+'" style="height:31px;width:34px;margin-right:14px;margin-bottom:4px;"><input type="text" name="commenterfield" id="commenterfield" class="commenterfield"></div><button id="buttonsubmitcommenter" class="btn btn-default col-xs-3 col-lg-3 buttonsubmitcommenter buttonsubmitcommenterstatus" ><span class="glyphicon glyphicon-send"></span></button></form>');
   var $divcommenter=$('<div class="divcommenters"></div>');

        originalRow.append(statusContainer).append($divcommenter.append(formcommenter).append());
        $("#profilecontent").prepend(originalRow);
}


function prependPosts(response){

  if(response['type']=="status")
    createStatus(response);

	if(response['type']=='image')
      createImage(response);

	if(response['type']=="video")
      createVideo(response);
}


$(function(){

    $('#formpost').submit(function(e){
      
    if($('[type="file"]').val()!="" || $('#statusfield').val()!=""){

    	 if($('#statusfield').val()!="" && $('[type="file"]').val()==""){
             //createStatus();
             setTimeout(function(){
               document.getElementById('formpost').reset();
             },2000);
          }

    	 var formulaire = new FormData($('form')[1]);
      $.ajax({
         url:'http://localhost/projetDSI/Controller/mains/savepost.php',
         type:"POST",
         data:formulaire,
         dataType:'json',
         success:function(response){
            prependPosts(response);
            document.getElementById('formpost').reset();
            $('#placeforfilename').text('');
         },
         cache:false,
         contentType:false,
         processData:false
      });
       
  }
     return false;
    });

});