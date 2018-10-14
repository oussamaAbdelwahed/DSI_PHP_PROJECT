var AcceuilComments={};
var AcceuilLikes={};

(function(){
          AcceuilComments.successListeComments=function(rep,placeappaned){

              for(var i=0;i<rep.length;i++){
                var parentcomment=$('<div class="col-xs-12 parentcomment"></div>');
                var divimageandname=$('<div class="row parentimageandname"><img src="'+rep[i].photo+'" id="'+rep[i].id_user+'" class="imageofcommenter"><a href="sessionfriend.php?id='+encodeURIComponent(rep[i].id_user)+'"><strong class="nameofcommenter">'+rep[i].nom+'</strong></a><small class="datepostcomment pull-right">'+rep[i].date_post_comment+'</small></div>');
                if(rep[i]['id_user']==$('a.lienimagecontainer').attr('id'))
                    var divcomment=$('<div class="row"><p class="commentappend" id='+rep[i].id_comment+'>'+rep[i].comment_content+'</p><span class="pull-right"><i class="icon-trash  icondeletecomment iconcomments" data='+rep[i].id_comment+'></i><i class="icon-edit iconupdatecomment iconcomments" data='+rep[i].id_comment+'></i></span></div>');
                else
                    var divcomment=$('<div class="row"><p class="commentappend" id='+rep[i].id_comment+'>'+rep[i].comment_content+'</p></div>');
                
                $(placeappaned).append(parentcomment.append(divimageandname).append(divcomment));
              }
           };


         AcceuilComments.AjaxGetListeUserCommentingThis=function(placeToApppendComments,idPost,typePost){
                
                 $.ajax({
                  type:'POST',
                  url:'http://localhost/projetDSI/controller/mains/comments.php',
                  data:'action=getlisteusers&idpost='+idPost+"&typepost="+typePost,
                  dataType:"json",
                  success:function(rep){
                    AcceuilComments.successListeComments(rep,placeToApppendComments);
                  }
                });
     
          };

                 AcceuilLikes.successNumberLikes=function(rep){

                    for(var i=0;i<rep.length;i++){
                      if(rep[i]['type']=="status"){
                        var parentstatus=$('.parentstatus');
                        for(var j=0;j<parentstatus.length;j++){
                          var v=$(parentstatus[j]).find('#'+rep[i]['id_post']);
                          if(v.length!=0){
                            $($(parentstatus[j]).find('.fornbrlikes')).text(rep[i]['nbr_likes']+" j'aimes");
                            $(parentstatus[j]).find('.fornbrlikes').parent().append("<hr class='hrafterlikes'>");
                            break;
                          }
                        }
                      }else if(rep[i]['type']=="image"){
                          var parentimage=$('.parentimage');
                        for(var j=0;j<parentimage.length;j++){
                          var v=$(parentimage[j]).find('#'+rep[i]['id_post']);
                          if(v.length!=0){
                            $($(parentimage[j]).find('.fornbrlikes')).text(rep[i]['nbr_likes']+" j'aimes");
                              $(parentimage[j]).find('.fornbrlikes').parent().append("<hr class='hrafterlikes'>");
                            break;
                          }
                        }
                      }else{
                            var parentvideo=$('.parentvideo');
                        for(var j=0;j<parentvideo.length;j++){
                          var v=$(parentvideo[j]).find('#'+rep[i]['id_post']);
                          if(v.length!=0){
                            $($(parentvideo[j]).find('.fornbrlikes')).text(rep[i]['nbr_likes']+" j'aimes");
                              $(parentvideo[j]).find('.fornbrlikes').parent().append("<hr class='hrafterlikes'>");
                            break;
                          }
                        }
                      }
                    } 
           };



           AcceuilLikes.AjaxCountLikes=function(idfriends){
                $.ajax({
                   type:'POST',
                   url:'http://localhost/projetDSI/controller/mains/countacceuillikes.php',
                   data:'action=countlikes&idfriends='+idfriends,
                   dataType:"json",
                   success:function(rep){
                   	console.log(rep);
                   AcceuilLikes.successNumberLikes(rep);
                   }
                });
             };
             AcceuilLikes.DoesLikeThis=function(idfriends){
              $.ajax({
                  type:'POST',
                  url:'http://localhost/projetDSI/controller/mains/countacceuillikes.php',
                  data:'ifhelikethis=true&idfriends='+idfriends,
                  dataType:'json',
                  success:function(response){
                    console.log(response);

                    for(var i=0;i<response.length;i++){
                      if(response[i].type=="status")
                        $('.parentstatus').find('i.'+response[i].id).addClass('clicked');
                      else if(response[i].type=="image")
                        $('.parentimage').find('i.'+response[i].id).addClass('clicked');
                      else
                         $('.parentvideo').find('i.'+response[i].id).addClass('clicked');
                    }
                  }
              });
           };


            AcceuilComments.AjaxGetNumberCommentsForThis=function(idfreinds){
              $.ajax({
                type:'POST',
                url:'http://localhost/projetDSI/controller/mains/commentsacceuil.php',
                data:'action=getnumbercomments&forfriend=true&idfreinds='+idfreinds,
                dataType:"json",

                success:function(rep){

                  for(var i=0;i<rep.length;i++){
                      if(rep[i]['type_post_commented']=="status"){
                        var parentstatus=$('.parentstatus');
                        for(var j=0;j<parentstatus.length;j++){
                          var v=$(parentstatus[j]).find('#'+rep[i]['id_post_commented']);
                          if(v.length!=0){
                            $($(parentstatus[j]).find('.fornbrcomments')).text(rep[i]['nbr_comments']+" commentaires");
                            break;
                          }
                        }
                      }else if(rep[i]['type_post_commented']=="image"){
                          var parentimage=$('.parentimage');
                        for(var j=0;j<parentimage.length;j++){
                          var v=$(parentimage[j]).find('#'+rep[i]['id_post_commented']);
                          if(v.length!=0){
                            $($(parentimage[j]).find('.fornbrcomments')).text(rep[i]['nbr_comments']+" commentaires");
                            break;
                          }
                        }
                      }else{
                            var parentvideo=$('.parentvideo');
                        for(var j=0;j<parentvideo.length;j++){
                          var v=$(parentvideo[j]).find('#'+rep[i]['id_post_commented']);
                          if(v.length!=0){
                            $($(parentvideo[j]).find('.fornbrcomments')).text(rep[i]['nbr_comments']+" commentaires");
                            break;
                          }
                        }
                      }
                    } 
                }
              });
            };

           AcceuilLikes.fillListLikers=function(rep,targetelement){
            $(targetelement).empty();
              for(var i=0;i<rep.length;i++){
                $(targetelement).append('<div class="col-xs-12 containerliker"><img src="'+rep[i].photo+'" class="imageliker"/><a href="sessionfriend.php?id='+encodeURIComponent(rep[i].id_user)+'"><strong>'+rep[i].nom+' '+rep[i].prenom+'</strong></a></div>');
              }
           };


            var counterFillListeLikers=0;

           AcceuilLikes.AjaxGetListeLikers=function($idpost,$typepost,$targetmodal){

             $.ajax({
               type:'POST',
               url:'http://localhost/projetDSI/controller/mains/likesfriend.php',
               data:'idpost='+$idpost+"&typepost="+$typepost,
               dataType:"json",
               success:function(rep){
                 counterFillListeLikers++;
                Likes.fillListLikers(rep,$targetmodal);
               }

               });
           };




})();