 $(function(){

      Posts.getProfilePosts($('a[title="profile"]').attr('id'));

              var informations;

              $(document).on('click','.deletepoststatus',function(){
                           var index=$(this).index('.deletepoststatus');
                           informations=EditingPostsView.getStatusInformations(index);
              });

              $(document).on('click','.deletepostimage',function(){
                          var index=$(this).index('.deletepostimage');
                          informations=EditingPostsView.getImageInformations(index);

              });

              $(document).on('click','.deletepostvideo',function(){
                         var index=$(this).index('.deletepostvideo');
                          informations=EditingPostsView.getVideoInformations(index);

              });

              $(document).on('click','#deletepost',function(){
                   if(informations !=null && informations !=undefined)
                       EditingPostsView.AjaxDelete(informations.dbtable,informations.idpost);
              });

               
              $(document).on('click','.likestatus',function(e){

                  var idstatus=$(this).closest('.parentstatus').find('p.contentstatus').attr('id');
                  var idposter=$('#id_poster').val();

                  if($(this).hasClass('clicked')){
                    $(this).removeClass('clicked');
                    EditingPostsView.AjaxRemoveLike($(this),"status_likes",idposter,idstatus);
                  }else{
                    $(this).addClass('clicked');
                    EditingPostsView.AjaxAddLike($(this),"status_likes",idposter,idstatus);
                  }
               
              });

               $(document).on('click','.likeimage',function(e){

                  var idimage=$(this).closest('.parentimage').find('img.imageinapost').attr('id');
                  var idposter=$('#id_poster').val();

                  if($(this).hasClass('clicked')){
                    $(this).removeClass('clicked');
                    EditingPostsView.AjaxRemoveLike($(this),"image_likes",idposter,idimage);
                  }else{
                    $(this).addClass('clicked');
                    EditingPostsView.AjaxAddLike($(this),"image_likes",idposter,idimage);
                  }
               
              });


                $(document).on('click','.likevideo',function(e){
     
                  var idvideo=$(this).closest('.parentvideo').find('video.videoinapost').attr('id');
                  var idposter=$('#id_poster').val();

                  if($(this).hasClass('clicked')){
                    $(this).removeClass('clicked');
                    EditingPostsView.AjaxRemoveLike($(this),"video_likes",idposter,idvideo);
                  }else{
                    $(this).addClass('clicked');
                    EditingPostsView.AjaxAddLike($(this),"video_likes",idposter,idvideo);
                  }
               
              });

         

          $('section').css('background-color','inherit').css('border','none');
          var c1=c2=c3=0;

          $(document).on('click','.commentstatus',function(){
             $(this).closest('.parentstatus').find('.divcommenters').find(".parentcomment").remove();
             $(this).closest('.parentstatus').find('.divcommenters').slideToggle();
             EditingPostsView.AjaxGetListeUserCommentingThis($(this).closest('.parentstatus').find('.divcommenters'),$(this).closest('.parentstatus').find('p.contentstatus').attr('id'),"status");
          }); 


         $(document).on('click','.commentimage',function(){
          $(this).closest('.parentimage').find('.divcommenters').find(".parentcomment").remove();
            $(this).closest('.parentimage').find('.divcommenters').slideToggle();
            EditingPostsView.AjaxGetListeUserCommentingThis($(this).closest('.parentimage').find('.divcommenters'),$(this).closest('.parentimage').find("img.imageinapost").attr('id'),"image");

          }); 
          $(document).on('click','.commentvideo',function(){
          $(this).closest('.parentvideo').find('.divcommenters').find(".parentcomment").remove();
            $(this).closest('.parentvideo').find('.divcommenters').slideToggle();
            EditingPostsView.AjaxGetListeUserCommentingThis($(this).closest('.parentvideo').find('.divcommenters'),$(this).closest('.parentvideo').find('video.videoinapost').attr('id'),"video");

          }); 


          $(document).on('click','.buttonsubmitcommenterstatus',function(event){

             event.preventDefault();
             var commentObject=$(this).closest('.formcommenter').find('.commenterfield');
             var postcommented=$(this).closest('.parentstatus').find('p.contentstatus').attr('id');
             EditingPostsView.AjaxPostComment("status",$(commentObject).val(),postcommented,commentObject);
           
          });

          $(document).on('click','.buttonsubmitcommenterimage',function(event){
             event.preventDefault();
             var commentObject=$(this).closest('.formcommenter').find('.commenterfield');
            var postcommented=$(this).closest('.parentimage').find('img.imageinapost').attr('id');
             EditingPostsView.AjaxPostComment("image",$(commentObject).val(),postcommented,commentObject);
            
          });

          $(document).on('click','.buttonsubmitcommentervideo',function(event){
            
             event.preventDefault();
             var commentObject=$(this).closest('.formcommenter').find('.commenterfield');
             var postcommented=$(this).closest('.parentvideo').find('video.videoinapost').attr('id');
             EditingPostsView.AjaxPostComment("video",$(commentObject).val(),postcommented,commentObject);

          });
          $(document).on('click','.fornbrlikes',function(){
            var modaltoappend=$(this).closest('.nbrlikescomments').find('.fade').find('.modal-body').find('div:first');
             EditingPostsView.AjaxGetListeLikers($(this).attr('id'),$(this).attr('type'),modaltoappend);
          });


          setTimeout(function(){
                   EditingPostsView.AjaxCountProfileLikes($('#id_poster').val());
                   EditingPostsView.AjaxGetNumberCommentsForThis();
                   EditingPostsView.DoesLikeThis();
        },1000);


          
        $(document).on('click','.icondeletecomment',function(e){
            EditingPostsView.removeCommenter($(this).attr('data'),$(this));
            console.log("delete declenched");
          });


          $(document).on('click','.iconupdatecomment',function(e){
            EditingPostsView.workForUpdateComment($(this).attr('data'),$(this));
          });

           Invitation.getListeInvitations($('#placetoappendinvitations'));
           Invitation.getNbrInvitations();

            $("#searchinput").keyup(function(e){
             Search.getResults($(this));
           });
         
            $('#searchinput').blur(function(){
              setTimeout(function(){
                   $('#resultsearch').hide();
              },100);
                  
            });
           
    });