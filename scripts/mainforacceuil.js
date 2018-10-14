$(function(){

	     $('section').css('background-color','inherit').css('border','none');

       Posts.getProfilePosts();

       $(document).on('click','#getnextpage',function(){
          Posts.getNextPage();
      });
      

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

                  if($(this).hasClass('clicked')){
                    $(this).removeClass('clicked');
                   Likes.AjaxRemoveLike(idstatus,"status",$(this));
                  }else{
                    $(this).addClass('clicked');
                    Likes.AjaxAddLike(idstatus,"status",$(this));
                  }
               
              });

               $(document).on('click','.likeimage',function(e){

                  var idimage=$(this).closest('.parentimage').find('img.imageinapost').attr('id');

                  if($(this).hasClass('clicked')){
                    $(this).removeClass('clicked');
                  Likes.AjaxRemoveLike(idimage,"image",$(this));
                  }else{
                    $(this).addClass('clicked');
                    Likes.AjaxAddLike(idimage,"image",$(this));
                  }
              });


                $(document).on('click','.likevideo',function(e){
     
                  var idvideo=$(this).closest('.parentvideo').find('video.videoinapost').attr('id');

                  if($(this).hasClass('clicked')){
                    $(this).removeClass('clicked');
                    Likes.AjaxRemoveLike(idvideo,"video",$(this));
                  }else{
                   $(this).addClass('clicked');
                   Likes.AjaxAddLike(idvideo,"video",$(this));
                  }
               
              });

           $(document).on('click','.commentstatus',function(){
             $(this).closest('.parentstatus').find('.divcommenters').find(".parentcomment").remove();
             $(this).closest('.parentstatus').find('.divcommenters').slideToggle();
             Comments.AjaxGetListeUserCommentingThis($(this).closest('.parentstatus').find('.divcommenters'),$(this).closest('.parentstatus').find('p.contentstatus').attr('id'),"status");
          }); 


         $(document).on('click','.commentimage',function(){
            $(this).closest('.parentimage').find('.divcommenters').find(".parentcomment").remove();
            $(this).closest('.parentimage').find('.divcommenters').slideToggle();
            Comments.AjaxGetListeUserCommentingThis($(this).closest('.parentimage').find('.divcommenters'),$(this).closest('.parentimage').find("img.imageinapost").attr('id'),"image");
          }); 


          $(document).on('click','.commentvideo',function(){
             $(this).closest('.parentvideo').find('.divcommenters').find(".parentcomment").remove();
             $(this).closest('.parentvideo').find('.divcommenters').slideToggle();
             Comments.AjaxGetListeUserCommentingThis($(this).closest('.parentvideo').find('.divcommenters'),$(this).closest('.parentvideo').find('video.videoinapost').attr('id'),"video");
          }); 

                    $(document).on('click','.buttonsubmitcommenterimage',function(event){
             event.preventDefault();
             var commentObject=$(this).closest('.formcommenter').find('.commenterfield');
            var postcommented=$(this).closest('.parentimage').find('img.imageinapost').attr('id');
             Comments.AjaxPostComment("image",$(commentObject).val(),postcommented,commentObject);
            
          });

          $(document).on('click','.buttonsubmitcommentervideo',function(event){
            
             event.preventDefault();
             var commentObject=$(this).closest('.formcommenter').find('.commenterfield');
             var postcommented=$(this).closest('.parentvideo').find('video.videoinapost').attr('id');
             Comments.AjaxPostComment("video",$(commentObject).val(),postcommented,commentObject);

          });
               $(document).on('click','.buttonsubmitcommenterstatus',function(event){

             event.preventDefault();
             var commentObject=$(this).closest('.formcommenter').find('.commenterfield');
             var postcommented=$(this).closest('.parentstatus').find('p.contentstatus').attr('id');
             Comments.AjaxPostComment("status",$(commentObject).val(),postcommented,commentObject);
           
          });

   
             setTimeout(function(){
             	var liste=$('img.userpostimage');
                var tab=[];
                for(var i=0;i<liste.length;i++)
                     tab.push($(liste[i]).attr('data'));

              AcceuilLikes.AjaxCountLikes(tab);
              AcceuilLikes.DoesLikeThis(tab);
              AcceuilComments.AjaxGetNumberCommentsForThis(tab);
            },1000);

         $(document).on('click','.fornbrlikes',function(){
             var modaltoappend=$(this).closest('.nbrlikescomments').find('.fade').find('.modal-body').find('div:first');
             AcceuilLikes.AjaxGetListeLikers($(this).attr('id'),$(this).attr('type'),modaltoappend);
          });

          $(document).on('click','#deletepost',function(){
                if(informations !=null && informations !=undefined)
                    EditingPostsView.AjaxDelete(informations.dbtable,informations.idpost);
          });
             
                       
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