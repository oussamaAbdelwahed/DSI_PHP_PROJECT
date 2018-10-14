var Posts={};
var AjaxFunctions={};
$(function(){
  AjaxFunctions.success=function(jsonData){
    console.log(jsonData);

  for(var i=0;i<jsonData.length;i++){
        if(jsonData[i]['type']=="status"){
           ViewGenerator.appendStatus(jsonData[i],"profilecontent");
        }else if(jsonData[i]['type']=="image"){
           ViewGenerator.appendImage(jsonData[i],"profilecontent");
        }else{
           ViewGenerator.appendVideo(jsonData[i],"profilecontent");
        }
    }
          $("#profilecontent").append("<h3 id='getnextpage' class='text-center' style='color:black;'>Afficher suite</h3>");  
  };


 Posts.getProfilePosts=function($id){
     $.ajax({
        url:'http://localhost/projetDSI/Controller/mains/getacceuilposts.php',
        type:'POST',
        dataType:'json',
        data:"action=fromacceuil&id="+$id,
        success:function(jsonData){
          AjaxFunctions.success(jsonData);
        }
      });
  };


Posts.getNextPage=function(){

  var idlaststatus=($('p.contentstatus:last').attr('id')==undefined)?0:$('p.contentstatus:last').attr('id');
  var idlastimage=($('img.imageinapost:last').attr('id')==undefined)?0:$('img.imageinapost:last').attr('id');
  var idlastvideo=($('video.videoinapost:last').attr('id')==undefined)?0:$('video.videoinapost:last').attr('id');
    
    $.ajax({
        url:'http://localhost/projetDSI/Controller/mains/getacceuilposts.php',
        type:'POST',
        dataType:'json',
        data:"action=getnextpage&idlaststatus="+idlaststatus+"&idlastimage="+idlastimage+"&idlastvideo="+idlastvideo,
        success:function(jsonData){

          $("#getnextpage").remove();
          AjaxFunctions.success(jsonData);
        }
    });
  };


});



