<?php
include '../controller/classes/traitsecuredata.php';
include '../controller/classes/user.php';
session_start();
if(isset($_SESSION['user'])){

if(isset($_SESSION['friend']) AND !empty($_SESSION['friend'])){
  unset($_SESSION['friend']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>acceuil </title>

	<?php
     include 'inc/headerresources.php';
	?>
    <link rel="stylesheet" href="../styles/styleheader.css">
   
  
  <style type="text/css">

 
    .dropdown {text-align:center;}
    .button, .dropdown-menu {margin:10px auto}
    .dropdown-menu {width:200px; left:50%; margin-left:-100px;}
    #dr{
      text-align: unset;
    }
    #drmenu{
      width: unset;left: unset;margin-left: unset;
      }.divcommenters{
        padding-left: 10px;
        padding-right: 10px;
      }.parentimageandname{
        padding-right: 30px;
      }#profilecontent{
        margin-bottom: 100px;
      }
     
  </style>
 
</head>
<body>
 
  <div class="container-fluid" id=<?php echo "\"".$_SESSION['user']->getId_user()."\"";?>>
     <?php include'inc/header.php';?>
     <div class="row"> 
      <div class="col-xs-12 col-lg-5 pull-right" id="formsearchcontainer">
       
        <form method="POST" action="" id="formsearch" class="col-xs-12 col-lg-7 pull-right">
           <div class="input-group pull-right">
            <input type="text" id="searchinput" autocomplete="off" name="search" class="form-control" placeholder="chercher un ami">
              <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
           </div>
           <div id="resultsearch">
            <p>Oussama Abdelwahed</p>
            <p>Mouin Lahbib</p>
            <p>Abdallah Mokchehddddddddddddddddddddd</p>
                      <p>Abdallah Mokchehddddddddddddddddddddd</p>
                                <p>Abdallah Mokchehddddddddddddddddddddd</p>
           </div>

         </form>
   
       </div>

        <div class="col-lg-3 visible-lg" id="personalprofileinfos">
            <div id="conproperties"> 
           <img style="cursor:pointer;" id="inpropimage" data-toggle="modal" data-target="#modalimage" src=<?php 
             $name=substr(explode(".", $urlimage)[0],0,strlen(explode(".", $urlimage)[0])- 3);
             $ext=substr(strrchr($urlimage,"."),1);
             echo $name."300.".$ext;
            ?>>
           <p  style="margin-top: 20px;"><strong>Nom</strong> : <span class="text-center"><?php echo $_SESSION['user']->getNom(); ?></span></p>
    <p><strong>Prenom</strong> : <span class="text-center"><?php echo $_SESSION['user']->getPrenom(); ?></span></p>
           <p><strong>Sex</strong> : <span class="text-center"><?php 
           if($_SESSION['user']->getSex()=="h")
              echo "Homme";
            else
              echo "Femme";
            ?></span></p>
           <p><strong>Date Naissance</strong> : <span class="text-center"><?php echo $_SESSION['user']->getBirthday(); ?></span></p>
           </div>
          </div>
      
      <div class="col-xs-12 col-lg-offset-3 col-lg-6 col-lg-offset-3" id="poster">
       <div id="postheader" class="col-lg-12">
         <img id="imageposter"  alt="userimageindivforposting" src=<?php echo "\"".$urlimage."\"";?>/>
         <?php echo "<strong>".$prenom."</strong>";?>
         <hr id="hr1">
       </div>
       <div class="postercontent" class="col-lg-12"></div>
        <form id="formpost" method="POST" enctype="multipart/form-data">
          <div class="col-lg-offset-1 col-lg-10 col-lg-offset-1 col-xs-12">
          <textarea cols="10" rows="5" id="statusfield" name="content" class="form-control" placeholder="publier quelque chose" style="margin-bottom:20px;"></textarea>
        </div>
        <div class="col-lg-offset-4 col-lg-4 col-lg-offset-4 col-xs-offset-1 col-xs-10 xol-xs-offset-1 text-center" id="containertitre" style="display: none;">
          <input type="text" placeholder="titre de publication" class="text-center" name="titre" id="titre">
        </div>
        <div class="col-lg-offset-1 col-lg-10 col-lg-offset-1 col-xs-12">
        <label class="btn btn-default btn-file">
        <i class="icon-folder-open"></i> video/image <input type="file" id="file" name="file" style="display: none;">
        </label><strong id="placeforfilename"></strong>
        </div>
        <div class="col-lg-offset-1 col-lg-10 col-lg-offset-1 col-xs-12">
          <input type="submit" name="envoyer" value="publier" id="publier" class="btn btn-primary pull-right btn-lg">
          <input type="hidden" id="id_poster" name="id_poster" value=<?php echo "\"".$id."\""; ?>>
        </div>
        </form>
      </div>
     </div>


     <div class="row">
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

<div id="modalimage" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Image Grande Taille </h4>
      </div>

      <div class="modal-body">
        <img style="width: 100%;margin: auto;" src=<?php
         $name=substr(explode(".", $urlimage)[0],0,strlen(explode(".", $urlimage)[0])- 3);
             $ext=substr(strrchr($urlimage,"."),1);
             echo "\"".$name.".".$ext."\"";
        ?>>
      </div>

      <div class="modal-footer">
       <!--  <button type="button" class="btn btn-default" id="deletepost" data-dismiss="modal">supprimer</button> -->
      </div>
      
    </div>

  </div>

</div>



</div>
</div>

  </div>

  <script type="text/javascript" src="../scripts/ajax/editposts.js"></script>
  <script type="text/javascript" src="../scripts/viewgeneratoracceuil.js"></script>
  <script type="text/javascript" src="../scripts/ajax/getacceuilposts.js"></script>
  <script type="text/javascript" src="../scripts/friend/friendactions.js"></script>
  <script type="text/javascript" src="../scripts/acceuilactions.js"></script>
  <script type="text/javascript" src="../scripts/ajax/invitations.js"></script>
  <script type="text/javascript" src="../scripts/ajax/search.js"></script>
  <script type="text/javascript" src="../scripts/mainforacceuil.js"></script>
  <script type="text/javascript" src="../scripts/ajax/postapostacceuil.js"></script>

</body>
</html>
<?php }else{ header('Location:login.php'); }?>