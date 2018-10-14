var ViewGenerator={};

ViewGenerator.appendStatus=function(jsonData,idTarget){


	    var imageuser=$("<img alt='utilisateur' class='userpostimage'/><strong class='nomutilisateru'>"+$('#prenomfriend').val()+"</strong>").attr('src',
		  $("#freindimage").val());
	    var originalRow=$('<div class="row parentstatus p"></div>');
        var statusContainer=$('<div class="col-xs-12  statuscon"></div>').attr('id',jsonData['id_poster']);
        var paragrapheStatus=$('<p class="contentstatus text-center" id="'+jsonData['id']+'">'+jsonData['content']+'</p>');
        var row1=$("<div class='row'></div>");
        row1.append(imageuser);
        row1.append("<small class='datepostpost pull-right' >"+jsonData['date_post']+"</small><hr class='hrpost'>");
        var row2=$("<div class='row'></div>");
        row2.append(paragrapheStatus);
               var rowLikesComments=$('<div class="nbrlikescomments"><small class="fornbrlikes" data-toggle="modal" type="status" id="'+jsonData['id']+'" data-target="#modalstatus'+jsonData['id']+'"></small><small class="fornbrcomments"></small></div>');
        var row3=$('<div class="row" id="bottomofpost"><i class="icon-thumbs-up likecomment likestatus '+jsonData['id']+'" type="status_post"></i><i class="icon-comments likecomment commentstatus"></i></div>');
          var modalikes=$('<div id="modalstatus'+jsonData['id']+'" class="modal fade col-lg-offset-4 col-lg-4 col-lg-offset-4" role="dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title text-center">Mentions de j\'aimes</h4></div> <div class="modal-body"><div class="row"></div></div></div></div>');
        statusContainer.append(row1).append(row2).append(row3.prepend(rowLikesComments.append(modalikes)));
         
        var formcommenter=$('<form class="form-inline col-xs-12 formcommenter" method="POST"><div  class="form-group  col-xs-9 col-lg-9"><img src="'+ $("#freindimage").val()+'" style="height:31px;width:34px;margin-right:14px;margin-bottom:4px;"><input type="text" name="commenterfield" id="commenterfield" class="commenterfield"></div><button id="buttonsubmitcommenter" class="btn btn-default col-xs-3 col-lg-3 buttonsubmitcommenter buttonsubmitcommenterstatus" ><span class="glyphicon glyphicon-send"></span></button></form>');
        var $divcommenter=$('<div class="divcommenters"></div>');
        originalRow.append(statusContainer).append($divcommenter.append(formcommenter).append('<div class="lll col-xs-12 col-lg-12"></div>'));
        $("#"+idTarget).append(originalRow);

};

ViewGenerator.appendImage=function(jsonData,idTarget){

   var imageuser=$("<img alt='utilisateur' class='userpostimage'/><strong class='nomutilisateru'>"+$('#prenomfriend').val()+"</strong>").attr('src',
		$("#freindimage").val());
   var originalRow=$('<div class="row parentimage p"></div>');
   var imageContainer=$('<div class="col-xs-12 statuscon"></div>').attr('id',jsonData['id_poster']);
   var row1=$("<div class='row'></div>");
   row1.append(imageuser);
   var Image=$('<p class="titleanypost titleimage">'+jsonData['titre']+'</p><img id="'+jsonData['id']+'" class="imageinapost" src="'+jsonData['url']+'">');
   row1.append("<span class='datepostpost pull-right' >"+jsonData['date_post']+"</span><hr class='hrpost'>");
   var row2=$("<div class='row'></div>");
   row2.append(Image);
   
   var row3=$('<div class="row" id="bottomofpost"><i class="icon-thumbs-up likecomment likeimage '+jsonData['id']+'" type="image_post"></i><i class="icon-comments likecomment commentimage"></i></div>');
           var modalikes=$('<div id="modalimage'+jsonData['id']+'" class="modal fade col-lg-offset-4 col-lg-4 col-lg-offset-4" role="dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title text-center">Mentions de j\'aimes</h4></div><div class="modal-body"><div class="row"></div></div></div></div>');
          var rowLikesComments=$('<div class="nbrlikescomments"><small class="fornbrlikes" data-toggle="modal" type="image" data-target="#modalimage'+jsonData['id']+'" id="'+jsonData['id']+'"></small><small class="fornbrcomments"></small></div>');
 
   imageContainer.append(row1).append(row2).append(row3.prepend(rowLikesComments.append(modalikes)));
      
      var formcommenter=$('<form class="form-inline col-xs-12 formcommenter" method="POST"><div  class="form-group  col-xs-9 col-lg-9"><img src="'+$("#freindimage").val()+'" style="height:31px;width:34px;margin-right:14px;margin-bottom:4px;"><input type="text" name="commenterfield" id="commenterfield" class="commenterfield"></div><button id="buttonsubmitcommenter" class="btn btn-default col-xs-3 col-lg-3 buttonsubmitcommenter buttonsubmitcommenterimage" ><span class="glyphicon glyphicon-send"></span></button></form>');
   var $divcommenter=$('<div class="divcommenters"></div>');

    originalRow.append(imageContainer).append($divcommenter.append(formcommenter).append('<div class="lll"></div>'));
    $("#"+idTarget).append(originalRow);

};

ViewGenerator.appendVideo=function(jsonData,idTarget){
	
      var imageuser=$("<img alt='utilisateur' class='userpostimage'/><strong class='nomutilisateru'>"+$('#prenomfriend').val()+"</strong>").attr('src',
		  $("#freindimage").val());
      var originalRow=$('<div class="row parentvideo p"></div>');
      var videoContainer=$('<div class="col-xs-12 statuscon"></div>').attr('id',jsonData['id_poster']);
      var row1=$("<div class='row'></div>");
      row1.append(imageuser);
      var video=$('<p class="titleanypost titlevideo">'+jsonData['titre']+'</p><video height="600" class="videoinapost" id="'+jsonData['id']+'" controls><source controls type="video/mp4" src="'+jsonData['url']+'"></source></video>');
      row1.append("<p class='datepostpost pull-right' >"+jsonData['date_post']+"</p><hr class='hrpost'>");
      var row2=$("<div class='row'></div>");
      row2.append(video);
      var row3=$('<div class="row" id="bottomofpost"><i class="icon-thumbs-up likecomment likevideo '+jsonData['id']+'" type="video_post"></i><i class="icon-comments likecomment commentvideo"></i></div>');
        var rowLikesComments=$('<div class="nbrlikescomments"><small class="fornbrlikes" data-toggle="modal" type="video" id="'+jsonData['id']+'" data-target="#modalvideo'+jsonData['id']+'"></small><small class="fornbrcomments"></small></div>');
       var modalikes=$('<div id="modalvideo'+jsonData['id']+'" class="modal fade col-lg-offset-4 col-lg-4 col-lg-offset-4" role="dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title text-center">Mentions de j\'aimes</h4></div> <div class="modal-body"><div class="row"></div></div></div></div>');
     videoContainer.append(row1).append(row2).append(row3.prepend(rowLikesComments.append(modalikes)));
   
      var formcommenter=$('<form class="form-inline col-xs-12 formcommenter" method="POST"><div  class="form-group  col-xs-9 col-lg-9"><img src="'+ $("#freindimage").val()+'" style="height:31px;width:34px;margin-right:14px;margin-bottom:4px;"><input type="text" name="commenterfield" id="commenterfield" class="commenterfield"></div><button id="buttonsubmitcommenter" class="btn btn-default col-xs-3 col-lg-3 buttonsubmitcommenter buttonsubmitcommentervideo" ><span class="glyphicon glyphicon-send"></span></button></form>');
var $divcommenter=$('<div class="divcommenters"></div>');
      originalRow.append(videoContainer).append($divcommenter.append(formcommenter).append('<div class="lll"></div>'));
    $("#"+idTarget).append(originalRow);
           
};
