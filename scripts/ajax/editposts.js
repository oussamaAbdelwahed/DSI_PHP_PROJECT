var EditingPostsView={};

EditingPostsView.createSubstituteElement=function(parent,idPost,typePost){

  var newElement=$('<textarea id="titlemodifier" cols="8" rows="3" style="width:100%;"></textarea>').css({border:'none','font-size':'20px'}).val($(parent).text());

     $("html,body").animate({scrollTop:$(parent).offset().top-150},'slow');
     $(parent).replaceWith($(newElement));

   $('#titlemodifier').on('focus',function(e){
          $(e.target).css({
            outline:'none',
            'outline-decoration':'none',
            border:'none'            
          });
     });

    $('#titlemodifier').on('blur',function(e){

             EditingPostsView.Ajax(newElement.val(),idPost,typePost,e.target,parent);
             
      });
     document.getElementById('titlemodifier').focus();
};



EditingPostsView.Ajax=function(content,idPost,typePost,element,parent){

   var variable="titre";
   if(typePost=="status")
     variable="content";

  $.ajax({
     type:'POST',
     url:'http://localhost/projetDSI/controller/mains/editpost.php',
     data:variable+'='+content+'&idpost='+idPost+"&typepost="+typePost,
     dataType:'json',
     success:function(rep){
          $(element).replaceWith($(parent).text(rep['content']));
     }
  });
};


EditingPostsView.createSubstituteStatusElement=function(parent,idPost,typePost){

  var newElement=$('<textarea id="statusmodifier" col="8" rows="3"></textarea>').css({border:'none','font-size':'20px'}).val($(parent).text());
     $("html,body").animate({scrollTop:$(parent).offset().top-150},'slow');
     $(parent).replaceWith($(newElement));

     document.getElementById('statusmodifier').onfocus=function(e){
       $(e.target).css({
              outline:'none',
            'outline-decoration':'none',
            border:'none'            
          });
     };

     document.getElementById('statusmodifier').onblur=function(e){
          EditingPostsView.Ajax(newElement.val(),idPost,typePost,e.target,parent);
      
     };
     document.getElementById('statusmodifier').focus();
};


EditingPostsView.editStatus=function(status){

     var index=$(status).index('.modifpoststatus');
     var parent=$(status).parents().find('.contentstatus');
     var $contentStatus=$(parent[index]).text();
     EditingPostsView.createSubstituteStatusElement(parent[index],$(parent[index]).attr('id'),'status');
};


EditingPostsView.editImage=function(status){

     var index=$(status).index('.modifpostimage');
     var parent=$(status).parents().find('.titleimage');
     var $contentTitre=$(parent[index]).text();
     EditingPostsView.createSubstituteElement(parent[index],$(parent[index]).next().attr('id'),'image');
};


EditingPostsView.editVideo=function(status){

     var index=$(status).index('.modifpostvideo');
     var parent=$(status).parents().find('.titlevideo');
     var $contentTitre=$(parent[index]).text(); 
     EditingPostsView.createSubstituteElement(parent[index],$(parent[index]).next().attr('id'),'video');
};



           EditingPostsView.getStatusInformations=function(index){

                 var element=$($('.deletepoststatus')[index]);
                 var dbtable=$(element).attr('type');
                 var status=$(element).parents().find('.contentstatus');
                 var idpost=$(status[index]).attr('id');    
                 return {
                  dbtable:dbtable,
                  idpost:idpost
                 };
            };

              EditingPostsView.getImageInformations=function(index){

                 var element=$($('.deletepostimage')[index]);
                 var dbtable=$(element).attr('type');
                 var image=$(element).parents().find('.titleimage');
                 var idpost=$(image[index]).next().attr('id');        
                 return {
                  dbtable:dbtable,
                  idpost:idpost
                 };
            };


             EditingPostsView.getVideoInformations=function(index){

                 var element=$($('.deletepostvideo')[index]);
                 var dbtable=$(element).attr('type');
                 var video=$(element).parents().find('.titlevideo');
                 var idpost=$(video[index]).next().attr('id');     
                 return {
                  dbtable:dbtable,
                  idpost:idpost
                 };
            };

            EditingPostsView.AjaxDelete=function(tableName,idPost){

                  $.ajax({
                        url:'http://localhost/projetDSI/Controller/mains/deletepost.php',
                        type:'POST',
                        data:'tablename='+tableName+"&idpost="+idPost,
                        success:function(){
                            if(tableName=="status_post"){
                                var itemToDelete=$('.parentstatus').find('p[id='+idPost+']');
                                $(itemToDelete).closest('.parentstatus').remove();
                            }else if(tableName=="image_post"){
                                var itemToDelete=$('.parentimage').find('img[id='+idPost+']');
                                $(itemToDelete).closest('.parentimage').remove();
                            }else{
                               var itemToDelete=$('.parentvideo').find('video[id='+idPost+']');
                               $(itemToDelete).closest('.parentvideo').remove();
                            }
                        }
                  });

            };

            EditingPostsView.AjaxAddLike=function(likebutton,type,idposter,idpost){

                      var varparam="";

                      if(type=="status_likes")
                          varparam="id_status_liked";
                      else if(type=="image_likes")
                          varparam="id_image_liked";
                      else
                          varparam="id_video_liked";

                     $.ajax({
                          type:'POST',
                          url:'http://localhost/projetDSI/controller/mains/likes.php',
                          data:"id_liker="+idposter+"&"+varparam+"="+idpost,
                          success:function(){

                                   if(type=="status_likes"){
                                        var nbr=$(likebutton).closest('.parentstatus').find('.fornbrlikes').text();
                                        if(nbr.length!=0)
                                          $(likebutton).closest('.parentstatus').find('.fornbrlikes').text(parseInt(nbr)+1+" j'aimes");
                                        else
                                           $(likebutton).closest('.parentstatus').find('.fornbrlikes').text("1 j'aimes");
                                    }else if(type=="image_likes"){
                                       var nbr= $(likebutton).closest('.parentimage').find('.fornbrlikes').text();
                                       if(nbr.length !=0)
                                          $(likebutton).closest('.parentimage').find('.fornbrlikes').text(parseInt(nbr)+1+" j'aimes");
                                      else
                                         $(likebutton).closest('.parentimage').find('.fornbrlikes').text("1 j'aimes");
                                   }else if(type=="video_likes"){
                                      var nbr= $(likebutton).closest('.parentivideo').find('.fornbrlikes').text();
                                      if(nbr.length!=0)
                                         $(likebutton).closest('.parentvideo').find('.fornbrlikes').text(parseInt(nbr)+1+" j'aimes");
                                      else
                                       $(likebutton).closest('.parentvideo').find('.fornbrlikes').text("1 j'aimes");
                                      }
                          }
                     });
            };


            EditingPostsView.AjaxRemoveLike=function(likebutton,type,idposter,idpost){

                         var varparam="";

                      if(type=="status_likes")
                          varparam="id_status_liked";
                      else if(type=="image_likes")
                          varparam="id_image_liked";
                      else
                          varparam="id_video_liked";

                       $.ajax({
                          type:'POST',
                          url:'http://localhost/projetDSI/controller/mains/likes.php',
                          data:"action=delete&id_liker="+idposter+"&"+varparam+"="+idpost,
                          success:function(){
                              
                                   if(type=="status_likes"){
                                        var nbr=$(likebutton).closest('.parentstatus').find('.fornbrlikes').text();
                                        if(nbr.length!=0)
                                          $(likebutton).closest('.parentstatus').find('.fornbrlikes').text(parseInt(nbr)-1+" j'aimes");
                                        else
                                           $(likebutton).closest('.parentstatus').find('.fornbrlikes').text("0 j'aimes");
                                    }else if(type=="image_likes"){
                                       var nbr= $(likebutton).closest('.parentimage').find('.fornbrlikes').text();
                                       if(nbr.length !=0)
                                          $(likebutton).closest('.parentimage').find('.fornbrlikes').text(parseInt(nbr)-1+" j'aimes");
                                      else
                                         $(likebutton).closest('.parentimage').find('.fornbrlikes').text("0 j'aimes");
                                   }else if(type=="video_likes"){
                                      var nbr= $(likebutton).closest('.parentivideo').find('.fornbrlikes').text();
                                      if(nbr.length!=0)
                                         $(likebutton).closest('.parentvideo').find('.fornbrlikes').text(parseInt(nbr)-1+" j'aimes");
                                      else
                                       $(likebutton).closest('.parentvideo').find('.fornbrlikes').text("0 j'aimes");
                                      }

                          }
                     });
           };


           EditingPostsView.successNumberLikes=function(rep){

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


           EditingPostsView.AjaxCountProfileLikes=function($userid){
            $.ajax({
               type:'POST',
               url:'http://localhost/projetDSI/controller/mains/countlikes.php',
               data:'userid='+$userid,
               dataType:"json",
               success:EditingPostsView.successNumberLikes
            });
           };


           EditingPostsView.DoesLikeThis=function(){
              $.ajax({
                  type:'POST',
                  url:'http://localhost/projetDSI/controller/mains/countlikes.php',
                  data:'ifhelikethis=true',
                  dataType:'json',
                  success:function(response){
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


           EditingPostsView.fillListLikers=function(rep,targetelement){
            $(targetelement).empty();
              for(var i=0;i<rep.length;i++){
                $(targetelement).append('<div class="col-xs-12 containerliker"><img src="'+rep[i].photo+'" class="imageliker"/><a href="sessionfriend.php?id='+encodeURIComponent(rep[i].id_user)+'"><strong>'+rep[i].nom+' '+rep[i].prenom+'</strong></a></div>');
              }
           };

            var counterFillListeLikers=0;

           EditingPostsView.AjaxGetListeLikers=function($idpost,$typepost,$targetmodal){

             $.ajax({
               type:'POST',
               url:'http://localhost/projetDSI/controller/mains/likes.php',
               data:'idpost='+$idpost+"&typepost="+$typepost,
               dataType:"json",
               success:function(rep){
                counterFillListeLikers++;
                //if(counterFillListeLikers==1)
                EditingPostsView.fillListLikers(rep,$targetmodal);
               }

               });

           };

            EditingPostsView.AjaxPostComment=function(typePost,comment,idpostcommented,inputComment){

                $.ajax({
                        type:'POST',
                        url:'http://localhost/projetDSI/controller/mains/comments.php',
                        data:'comment='+comment+"&idpostcommented="+idpostcommented+"&typepost="+typePost,
                        dataType:'json',
                        success:function(response){
                          $(inputComment).val(" ");
            
                            var parentcomment=$('<div class="col-xs-12 parentcomment"></div>');
                            var divimageandname=$('<div class="row parentimageandname"><img src="'+$("#profilephoto1").attr('src')+'" id="'+$('#sessionid').attr('id')+'" class="imageofcommenter"><a href="sessionfriend.php?id='+encodeURIComponent($($('.sessionid')[0]).attr('id'))+'"><strong class="nameofcommenter">'+$('#sessionprenom').text()+'</strong></a><small class="pull-right datepostcomment">'+getCurrentDate()+'</small></div>');
                            var par=$('<p class="commentappend"></p>');
                            par.text(response['comment']);
                            var divcomment=$('<div class="row"><span class="pull-right"><i class="icon-trash  icondeletecomment iconcomments" data='+response['id']+'></i><i class="icon-edit iconupdatecomment iconcomments" data='+response['id']+'></i></span></div>');
                            divcomment.prepend(par);
                            parentcomment.append(divimageandname).append(divcomment);
                            $(parentcomment).insertAfter($(inputComment).closest('form.formcommenter'));
                            
                            if(typePost=="status"){
                              var nbr=$(inputComment).closest('.parentstatus').find('.fornbrcomments').text();
                              if(nbr.length!=0)
                                $(inputComment).closest('.parentstatus').find('.fornbrcomments').text(parseInt(nbr)+1+" commentaires");
                              else
                                  $(inputComment).closest('.parentstatus').find('.fornbrcomments').text("1 commentaires");
                            }else if(typePost=="image"){
                               var nbr=$(inputComment).closest('.parentimage').find('.fornbrcomments').text();
                               if(nbr.length!=0)
                                 $(inputComment).closest('.parentimage').find('.fornbrcomments').text(parseInt(nbr)+1+" commentaires");
                               else
                                 $(inputComment).closest('.parentimage').find('.fornbrcomments').text("1 commentaire");
                            }else{
                              var nbr=$(inputComment).closest('.parentvideo').find('.fornbrcomments').text();
                              if(nbr.length!=0)
                                $(inputComment).closest('.parentvideo').find('.fornbrcomments').text(parseInt(nbr)+1+" commentaires");
                              else
                                $(inputComment).closest('.parentvideo').find('.fornbrcomments').text("1 commentaires");
                            }
                        }
                });
            };

            EditingPostsView.AjaxGetNumberCommentsForThis=function(){
              $.ajax({
                type:'POST',
                url:'http://localhost/projetDSI/controller/mains/comments.php',
                data:'action=getnumbercomments',
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


             EditingPostsView.successListeComments=function(rep,placeappaned){

              for(var i=0;i<rep.length;i++){
                var parentcomment=$('<div class="col-xs-12 parentcomment"></div>');
                var divimageandname=$('<div class="row parentimageandname"><img src="'+rep[i].photo+'" id="'+rep[i].id_user+'" class="imageofcommenter"><a href="sessionfriend.php?id='+encodeURIComponent(rep[i].id_user)+'"><strong class="nameofcommenter">'+rep[i].nom+'</strong></a><small class="datepostcomment pull-right">'+rep[i].date_post_comment+'</small></div>');
                    if(parseInt(rep[i]['id_user'])==parseInt($('#id_poster').val()))
                       var divcomment=$('<div class="row"><p class="commentappend" id='+rep[i].id_comment+'>'+rep[i].comment_content+'</p><span class="pull-right"><i class="icon-trash  icondeletecomment iconcomments" data='+rep[i].id_comment+'></i><i class="icon-edit iconupdatecomment iconcomments" data='+rep[i].id_comment+'></i></span></div>');
                    else
                       var divcomment=$('<div class="row"><p class="commentappend" id='+rep[i].id_comment+'>'+rep[i].comment_content+'</p><span class="pull-right"><i class="icon-trash  icondeletecomment iconcomments" data='+rep[i].id_comment+'></i></span></div>');


                $(placeappaned).append(parentcomment.append(divimageandname).append(divcomment));
              }
             };

             EditingPostsView.removeCommenter=function(idcomment,elementclicked){
               $.ajax({
                 url:'http://localhost/projetDSI/controller/mains/deletecomment.php',
                 type:'POST',
                 data:'idcomment='+idcomment,
                 success:function(rep){
                    var nbrcomm=$(elementclicked).closest('.p').find('small.fornbrcomments');
                    $(nbrcomm).text(parseInt($(nbrcomm).text()) -1+" commentaires");
                    $(elementclicked).closest('.parentcomment').remove();
                 }
               });
             };



             EditingPostsView.workForUpdateComment=function(idcomment,clickedElement){

                  var originalElement=$(clickedElement).closest('.parentcomment').find('p.commentappend');
                  var $remplacant=$('<input type="text" name="newcommentcontent" id="newcommentcontent" value="'+$(originalElement).html()+'">');

                  $(originalElement).replaceWith($($remplacant));

                  $('#newcommentcontent').on('focus',function(e){
                        $(e.target).css({
                           outline:'none',
                           border:'none',
                           'font-size':'18px'
                          });
                  });
                  
                  $('#newcommentcontent').on('blur',function(e){
                         EditingPostsView.updateComment(idcomment,$(e.target).val());
                         $(this).replaceWith($($(originalElement).text($(e.target).val())));
                  });
                document.querySelector('#newcommentcontent').focus();
           
             };



              EditingPostsView.updateComment=function(idcomment,commentContent){
                  $.ajax({
                    type:'POST',
                    url:'http://localhost/projetDSI/controller/mains/deletecomment.php',
                    data:'update=true&idcomment='+idcomment+'&comment='+commentContent,
                    dataType:'json',
                    success:function(rep){
                      console.log(rep);
                    }
                  });
              };


            EditingPostsView.AjaxGetListeUserCommentingThis=function(placecomments,idpost,typepost){
               $.ajax({
                type:'POST',
                url:'http://localhost/projetDSI/controller/mains/comments.php',
                data:'action=getlisteusers&idpost='+idpost+"&typepost="+typepost,
                dataType:"json",
                success:function(rep){
                  EditingPostsView.successListeComments(rep,placecomments);
                }
              });
            };

 