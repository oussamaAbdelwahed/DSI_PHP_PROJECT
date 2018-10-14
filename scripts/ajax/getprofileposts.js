
var Posts={};
var AjaxFunctions={};

  AjaxFunctions.success=function(jsonData){

	for(var i=0;i<jsonData.length;i++){

		if(jsonData[i]['type']=="status"){
       	   ViewGenerator.appendStatus(jsonData[i],"profilecontent");
        }else if(jsonData[i]['type']=="image"){
           ViewGenerator.appendImage(jsonData[i],"profilecontent");
        }else{
        	ViewGenerator.appendVideo(jsonData[i],"profilecontent");
        }
    }   

  };

 Posts.getProfilePosts=function($id){
     $.ajax({
        url:'http://localhost/projetDSI/Controller/mains/getprofileposts.php',
        type:'POST',
        dataType:'json',
        data:"id="+$id,
        success:AjaxFunctions.success
      });
  };

  Posts.getHomePosts=function(){
    
  };
