<!DOCTYPE html>
<html>
<head>
	<title>Page d'acceuil</title>
    <?php
     require("inc/headerresources.php");
    ?>
     <link rel="stylesheet" type="text/css" href="../styles/pageinscriptioncss.css">
      <style type="text/css">
      body{
        background-color: white;

      }#formcontainer{
        border:none;
   padding: 0px 25px 0px 25px;
      }body{
        overflow-x: hidden;
      }
      </style>
</head>
<body>

<?php 

include "inc/remplirdatenaissance.php";
include "inc/indexerrors.php";
$remplissageOptions=new RemplissageOptions();
?>

<div class="container-fluid">
<div class="row">

<nav class="navbar navbar-fixed-top navbar-default">
<div class="navbar-header hidden-xs">

<a href="#" class="navbar-brand" style="color:white;">Be Social</a><br>

</div>
<div class="container">

<ul class="nav navbar-nav navbar-right nav-pills">

	<li class="act"><a class="navitem" href="http://localhost/projetDSI/view/index.php" style="color: white;">creér un compte</a></li>
	<li><a class="navitem" href="http://localhost/projetDSI/view/login.php" style="color: white;">se connecter</a></li>

</ul>

</div>

</nav>

<div class="row" id="marging">

<section class="col-lg-12 col-sm-12 col-xs-12 pull-right">

<div class="row">

  <div class="col-lg-7 hidden-sm hidden-xs hidden-md" id="video">
    <video id="vid"  height="450"  class="col-lg-12" autoplay   loop muted>
       <source class="col-lg-8" src="../intro2.mp4" type="video/mp4">
    </video>
  </div>

<div class="col-lg-4 col-xs-12" id="formcontainer">
<div class="row">
<div class="col-lg-offset-1 col-lg-10 col-lg-offset-1">
	<h2 id="titre1"><center>Créer Un Compte</center></h2>
</div>

</div>
<form class="form-horizontal col-lg-12 col-xs-12" method="POST" action="http://localhost/projetdsi/controller/mains/maininscription.php" enctype="multipart/form-data">
	<div class="row">
	<label for="nom" class="col-lg-2">Nom</label>
     <div class="form-group col-lg-10">
     	<input type="text" id="nom" name="nom" class="form-control">
     	<p class="error-inputs">nom invalide</p>
     </div>
	</div>

	<div class="row">
	<label for="prenom" class="col-lg-2">Prenom</label>
     <div class="form-group col-lg-10">
     	<input type="text" id="prenom" name="prenom" class="form-control">
     	<p class="error-inputs">Prenom invalide</p>
     </div>
	</div>

	<div class="row">
	<label for="email" class="col-lg-2">Email</label>
     <div class="form-group col-lg-10">
     	<input type="email" id="email" name="email" class="form-control">
     	<p class="error-inputs">Email invalide</p>
        <p class="errorphp"><?php 
         if(isset($eremail))
           echo $eremail;
        ?></p>
     </div>
	</div>

	<div class="row">
	<label for="password" class="col-lg-2">M.D.P</label>
     <div class="form-group col-lg-10">
     	<input type="password" name="password" id="password" class="form-control">
     	<p class="error-inputs">Mot de passe invalide</p>
      <p class="errorphp"><?php 
      if(isset($erpassword))
      echo $erpassword;
      ?></p>
     
     </div>
	</div>
	<div class="row">
	<label for="confpassword" class="col-lg-2">Confirm M.D.P</label>
     <div class="form-group col-lg-10">
     	<input type="password" id="confpassword" name="confpassword" class="form-control">
     	<p class="error-inputs">Mot de passe non identique</p>
     </div>
	</div>
	<div class="row">
     <label for="file" class="col-lg-2">Photo</label>
     <div class="form-group col-lg-10">
   
 <div class="fileinput fileinput-new" data-provides="fileinput">
    <span class="btn btn-default btn-file"><span><label for="file" style="cursor: pointer;">choisir un fichier</label></span><input type="file"  id="file" name="file" style="display: none;"/></span>
  
</div>

    
     <p class="error-inputs">Veuillez choisir une photo</p>
     <p class="errorphp"><?php 
     if(isset($erimage))
     echo  $erimage;
     ?></p>
     </div>

	</div>

	<div class="row">
	<div class="col-xs-4">
		<select class="form-control" name="jours" id="jours">
			<option selected="selected" value="j">Jours</option>
			<?php $remplissageOptions->remplirJours();?>
			</select>
	</div>

	<div class="col-xs-4">
		<select class="form-control" name="mois" id="mois">
			<option selected="selected" value="m">Mois</option>
			<?php $remplissageOptions->remplirMois();?>
		</select>
	</div>

	<div class="col-xs-4">
		<select class="form-control" name="annee" id="annee">
			<option selected="selected" value="a">Annee</option>
				<?php $remplissageOptions->remplirAnnee();?>
		</select>
	</div>
	<div class="row">
		<p class="error-inputs" id="errordn">Vérifier la date du naissance</p>
	</div>

	</div>

	<div class="row" id="radiocontainer">
      <div class="col-lg-offset-1 col-lg-4 col-lg-offset-1">
      <div class="row">
      	 <center><input id="h" type="radio" name="sex" value="h"></center>
      	 </div>
      	 <div class="row">
            <center><label for="h">Homme</label></center>
      	 </div>
      </div>


      <div class="col-lg-offset-1 col-lg-4 col-lg-offset-1" id="radiocontainer">
      	<div class="row">
      	 <center><input id="f" type="radio" name="sex" value="f"></center>
      	 </div>
      	 <div class="row">
            <center><label for="f">Femme</label></center>
      	 </div>

      </div>
      <div class="row">
      	 <div class="col-lg-12"><p class="error-inputs"><CENTER id="errors">Choisir vote sexe</CENTER></p></div>
      </div>
	</div>
	<div class="row" id="buttoncontainer">
     
      <center><input id="one" type="submit" name="envoyer" value="Valider" class="btn btn-default btnindexpage">
      
      <input type="reset" name="reset" value="Effacer" class="btn btn-default btnindexpage"></center>

	</div>

</form>
</div>

</div>
</section>

</div>
</div>
</section>
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/fortestinginputs.js"></script>
<script type="text/javascript" src="../scripts/controlindexinputs.js"></script>
<script type="text/javascript">
  var video = document.querySelector('video');
video.addEventListener('timeupdate', function() {
  console.log(video.currentTime);
   if(video.currentTime>=38) {
     video.currentTime = 0;
     video.play();
   }
});
</script>
</body>
</html>