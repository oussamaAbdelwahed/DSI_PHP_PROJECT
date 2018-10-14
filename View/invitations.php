<?php
include '../controller/classes/traitsecuredata.php';
include '../controller/classes/user.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Invitations </title>
	<?php
     include 'inc/headerresources.php';
	?>
  <link rel="stylesheet" href="../styles/styleheader.css">
  <style type="text/css">
     body{
        background-color: rgba(221,224,223,0.4);
      }
    .dropdown {text-align:center;}
    .button, .dropdown-menu {margin:10px auto}
    .dropdown-menu {width:200px; left:50%; margin-left:-100px;}
    #dr{
      text-align: unset;
    }
    #drmenu{
      width: unset;left: unset;margin-left: unset;
      }
  </style>
</head>

<body>
  <div class="container" style="margin-top: 100px;">
    <?php include'inc/header.php';?>
    <h1 class="text-center" style="margin-bottom: 45px;color:black;font-family: arial;">Invitations</h1>
    <div class="col-xs-12 col-lg-offset-3 col-lg-6 col-lg-offset-3" id="placetoappend">
      
   
    </div>
  </div>

      <script type="text/javascript" src="../scripts/ajax/invitations.js"></script>
      <script type="text/javascript">
$(function(){

  function callback(rep,placetoappend){
                         if(rep.length!=0)
                  var targetAppend=$(placetoappend);
                  targetAppend.empty();
                  for(var i=0;i<rep.length;i++){
                    var elementLi=$('<div style="margin-bottom:40px;margin-top:10px;" class="row"></div>');
                    var elementImage=$('<img src="'+rep[i].photo+'" style="height:60px;width:60px;margin-left:0px;">');
                    var elementNomPrenom=$('<strong><a href="sessionfriend.php?id='+rep[i].id_inviter+'"> '+rep[i].nom+' '+rep[i].prenom+'</a></strong>');
                    var towButtons=$('<button class="btn btn-default acceptinvi pull-right" data="'+rep[i].id_inviter+'" style="font-size:15px;margin:0px 20px 0px px;cursor:pointer;">Accepter</button><button class="btn btn-default declineinvi pull-right" data="'+rep[i].id_inviter+'" style="font-size:15px;cursor:pointer;">Refuser</button>');
                    $(targetAppend).append(elementLi.append(elementImage).append(elementNomPrenom).append(towButtons)).append($('<hr style="color:black;background-color:black;height:1px;">'));

                  }
   }

                  Invitation.getListeInvitations($('#placetoappend'),callback);
});
    
      </script>
</body>