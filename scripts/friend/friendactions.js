var Likes={};
var Comments={};


Likes.AjaxAddLike=function(idpost,typepost,likebutton){
	$.ajax({
		url:'http://localhost/projetDSI/controller/mains/likes.php',
		type:'POST',
		data:'from=friendprofile&action=addlike&idpost='+idpost+'&typepost='+typepost,

		success:function(rep){

            if(typepost=="status"){
                var nbr=$(likebutton).closest('.parentstatus').find('.fornbrlikes').text();
                 if(nbr.length!=0)
                    $(likebutton).closest('.parentstatus').find('.fornbrlikes').text(parseInt(nbr)+1+" j'aimes");
                else
                    $(likebutton).closest('.parentstatus').find('.fornbrlikes').text("1 j'aimes");
            }else if(typepost=="image"){
                var nbr= $(likebutton).closest('.parentimage').find('.fornbrlikes').text();
                if(nbr.length !=0)
                  $(likebutton).closest('.parentimage').find('.fornbrlikes').text(parseInt(nbr)+1+" j'aimes");
              else
                  $(likebutton).closest('.parentimage').find('.fornbrlikes').text("1 j'aimes");
           }else if(typepost=="video"){
              var nbr= $(likebutton).closest('.parentivideo').find('.fornbrlikes').text();
              if(nbr.length!=0)
                  $(likebutton).closest('.parentvideo').find('.fornbrlikes').text('xd');
               else
                  $(likebutton).closest('.parentvideo').find('.fornbrlikes').text("1 j'aimes");
              }
			
		}
	});
};

Likes.AjaxRemoveLike=function(idpost,typepost,likebutton){
	$.ajax({
		url:'http://localhost/projetDSI/controller/mains/likes.php',
		type:'POST',
		data:'from=friendprofile&action=removelike&idpost='+idpost+'&typepost='+typepost,
		success:function(rep){
		 if(typepost=="status"){
                var nbr=$(likebutton).closest('.parentstatus').find('.fornbrlikes').text();
                if(nbr.length!=0)
                  $(likebutton).closest('.parentstatus').find('.fornbrlikes').text(parseInt(nbr)-1+" j'aimes");
                 else
                    $(likebutton).closest('.parentstatus').find('.fornbrlikes').text("0 j'aimes");
            }else if(typepost=="image"){
                var nbr= $(likebutton).closest('.parentimage').find('.fornbrlikes').text();
                if(nbr.length !=0)
                  $(likebutton).closest('.parentimage').find('.fornbrlikes').text(parseInt(nbr)-1+" j'aimes");
              else
                  $(likebutton).closest('.parentimage').find('.fornbrlikes').text("0 j'aimes");
            }else if(typepost=="video"){
              var nbr= $(likebutton).closest('.parentivideo').find('.fornbrlikes').text();
              if(nbr.length!=0)
                  $(likebutton).closest('.parentvideo').find('.fornbrlikes').text(parseInt(nbr)-1+" j'aimes");
              else
                $(likebutton).closest('.parentvideo').find('.fornbrlikes').text("0 j'aimes");
              }

		}
	});
};

       Likes.successNumberLikes=function(rep){

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



           Likes.AjaxCountLikes=function($userid){
                $.ajax({
                   type:'POST',
                   url:'http://localhost/projetDSI/controller/mains/countlikes.php',
                   data:'userid='+$userid,
                   dataType:"json",
                   success:function(rep){
                   Likes.successNumberLikes(rep);
                   }
                });
             };



             Comments.removeCommenter=function(idcomment,elementclicked){
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

                Comments.successListeComments=function(rep,placeappaned){

              for(var i=0;i<rep.length;i++){
                var parentcomment=$('<div class="col-xs-12 parentcomment"></div>');
                var divimageandname=$('<div class="row parentimageandname"><img src="'+rep[i].photo+'" id="'+rep[i].id_user+'" class="imageofcommenter"><a href="sessionfriend.php?id='+encodeURIComponent(rep[i].id_user)+'"><strong class="nameofcommenter">'+rep[i].nom+'</strong></a><small class="datepostcomment pull-right" style="margin-right:20px;">'+rep[i].date_post_comment+'</small></div>');
                if(rep[i]['id_user']==$('a.lienimagecontainer').attr('id'))
                    var divcomment=$('<div class="row"><p class="commentappend" id='+rep[i].id_comment+'>'+rep[i].comment_content+'</p><span class="pull-right"><i class="icon-trash  icondeletecomment iconcomments" data='+rep[i].id_comment+'></i><i class="icon-edit iconupdatecomment iconcomments" data='+rep[i].id_comment+'></i></span></div>');
                else
                    var divcomment=$('<div class="row"><p class="commentappend" id='+rep[i].id_comment+'>'+rep[i].comment_content+'</p></div>');
                
                $(placeappaned).append(parentcomment.append(divimageandname).append(divcomment));
              }
             };



             Comments.AjaxGetListeUserCommentingThis=function(placeToApppendComments,idPost,typePost){
                
                 $.ajax({
                  type:'POST',
                  url:'http://localhost/projetDSI/controller/mains/comments.php',
                  data:'action=getlisteusers&idpost='+idPost+"&typepost="+typePost,
                  dataType:"json",
                  success:function(rep){
                    Comments.successListeComments(rep,placeToApppendComments);
                  }
                });
     
             };

        Likes.DoesLikeThis=function(){
              $.ajax({
                  type:'POST',
                  url:'http://localhost/projetDSI/controller/mains/countlikes.php',
                  data:'ifhelikethis=true',
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


           Comments.getCurrentDate=function(){

                  var d=new Date();
                  var year=d.getFullYear();
                  var month=parseInt(d.getMonth())+1;
                  var day="0"+d.getDay();
                  return year+"-"+month+"-"+day+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds(); 
            };


        Comments.AjaxPostComment=function(typePost,comment,idpostcommented,inputComment){

                $.ajax({
                        type:'POST',
                        url:'http://localhost/projetDSI/controller/mains/comments.php',
                        data:'comment='+comment+"&idpostcommented="+idpostcommented+"&typepost="+typePost,
                        dataType:'json',
                        success:function(response){
                          $(inputComment).val(" ");
            
                            var parentcomment=$('<div class="col-xs-12 parentcomment"></div>');
                            var divimageandname=$('<div class="row parentimageandname"><img src="'+$("#profilephoto1").attr('src')+'" id="'+$('#sessionid').attr('id')+'" class="imageofcommenter"><a href="sessionfriend.php?id='+encodeURIComponent($($('.sessionid')[0]).attr('id'))+'"><strong class="nameofcommenter">'+$('#sessionprenom').text()+'</strong></a><small class="pull-right datepostcomment" style="margin-right:30px;">'+Comments.getCurrentDate()+'</small></div>');
                            var par=$('<p class="commentappend"></p>');
                            par.text(response['comment']);
                            var divcomment=$('<div class="row"><span class="pull-right"><i class="icon-trash  icondeletecomment iconcomments" data='+response['id']+'></i><i class="icon-edit iconupdatecomment iconcomments" data='+response['id']+' style="margin-right:30px;"></i></span></div>');
                            divcomment.prepend(par);
                            parentcomment.append(divimageandname).append(divcomment);
                            // $(inputComment).closest('form').next().prepend(divimageandname.append(divcomment));
                             // $(inputComment).closest('form').next().prepend(parentcomment);
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

       Likes.fillListLikers=function(rep,targetelement){
            $(targetelement).empty();
              for(var i=0;i<rep.length;i++){
                $(targetelement).append('<div class="col-xs-12 containerliker"><img src="'+rep[i].photo+'" class="imageliker"/><a href="sessionfriend.php?id='+encodeURIComponent(rep[i].id_user)+'"><strong>'+rep[i].nom+' '+rep[i].prenom+'</strong></a></div>');
              }
           };


            var counterFillListeLikers=0;


           Likes.AjaxGetListeLikers=function($idpost,$typepost,$targetmodal){

             $.ajax({
               type:'POST',
               url:'http://localhost/projetDSI/controller/mains/likesfriend.php',
               data:'idpost='+$idpost+"&typepost="+$typepost,
               dataType:"json",
               success:function(rep){
                counterFillListeLikers++;
                //if(counterFillListeLikers==1)
                Likes.fillListLikers(rep,$targetmodal);
               }

               });
           };

            Comments.AjaxGetNumberCommentsForThis=function(){
              $.ajax({
                type:'POST',
                url:'http://localhost/projetDSI/controller/mains/comments.php',
                data:'action=getnumbercomments&forfriend=true',
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

         Comments.workForUpdateComment=function(idcomment,clickedElement){

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
                         Comments.updateComment(idcomment,$(e.target).val());
                         $(this).replaceWith($($(originalElement).text($(e.target).val())));
                  });
                document.querySelector('#newcommentcontent').focus();
             };


              Comments.updateComment=function(idcomment,commentContent){
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
  
