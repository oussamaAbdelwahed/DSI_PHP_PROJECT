<?php
include '../controller/classes/traitsecuredata.php';
include '../controller/classes/user.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION['friend']->getNom();?> </title>
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
  <?php if(isset($_SESSION['friend']))
    $urlimagefriend=$_SESSION['friend']->getPhoto();
            $prenomfriend=$_SESSION['friend']->getPrenom();
            $idfriend=$_SESSION['friend']->getId_user();
            ?>
	<div class="container-fluid" id=<?php echo "\"".$idfriend."\"";?>>
     <?php include'inc/header.php';
     if(isset($_SESSION['friend'])){ 
     	  
     	?>
           <div class="col-lg-3 visible-lg" id="personalprofileinfos" data=<?php echo "\"".$idfriend."\"";?> style="margin-top: 90px;">
            <div id="conproperties"> 
           <img id="inpropimage" src=<?php 
             $name=substr(explode(".", $urlimagefriend)[0],0,strlen(explode(".", $urlimagefriend)[0])- 3);
             $ext=substr(strrchr($urlimagefriend,"."),1);
             echo $name."300.".$ext;
            ?>>
           <p style="margin-top: 20px;"><strong>Nom</strong> : <span class=""><?php echo $_SESSION['friend']->getNom(); ?></span></p>
           <p><strong>Prenom</strong> : <span class=""><?php echo $_SESSION['friend']->getPrenom(); ?></span></p>
           <p><strong>Sex</strong> : <span class=""><?php 
           if($_SESSION['friend']->getSex()=="h")
              echo "Homme";
            else
              echo "Femme";
            ?></span></p>
           <p><strong>Date Naissance</strong> : <span class=""><?php echo $_SESSION['friend']->getBirthday(); ?></span></p>
           </div>
          </div>
          
      <input type="hidden" name="freindimage" id="freindimage" value=<?php echo "\"".$urlimagefriend."\"";?>>
      <input type="hidden" name="prenomfriend" id="prenomfriend" value=<?php echo "\"".$prenomfriend."\"";?>>
        <input type="hidden" name="idusersession" id="idusersession" value=<?php echo "\"".$id."\"";?>>


     <div class="row">
      <div class="col-xs-12">
      <div class="row" style="margin-top: 30px;" id="invitationitem">
       <button class="btn btn-default pull-right" id="btninvitation" data=<?php echo "\"".$idfriend."\"";?>>Inviter</button>


       </div>
       </div>



      <section class="section col-xs-12 col-lg-offset-3 col-lg-6 col-lg-offset-3" id="profilecontent">


     </section>

     <div id="myModal" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Avertissment <i class="icon-warning-sign"></i> </h4>
      </div>
      <div class="modal-body">
        <p>voulez-vous vraiment supprimer le poste ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="deletepost" data-dismiss="modal">supprimer</button>
      </div>
      
    </div>

  </div>

</div>

	</div>
  
    <script type="text/javascript" src="../scripts/friend/friendviewgenerator.js"></script>
    <script type="text/javascript" src="../scripts/ajax/getprofileposts.js"></script>
    <script type="text/javascript" src="../scripts/friend/friendactions.js"></script>
    <script type="text/javascript" src="../scripts/ajax/invitations.js"></script>
    <script type="text/javascript" src="../scripts/friend/mainforfriend.js"></script>

</body>
</html>
<?php }else{
            header("Location:login.php");
      }
?>