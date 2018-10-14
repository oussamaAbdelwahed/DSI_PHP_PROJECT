<!DOCTYPE html>
<html>
<head>
	<title>Mpot de passe oublie</title>
	<link rel="stylesheet" type="text/css" href="../styles/pageinscriptioncss.css">

	<?php

     require("inc/headerresources.php");
	?>

	<style type="text/css">
	body{
		background-color:white;
	}#block{
		background-color: rgba(177,179,54,0.8);
	}
	</style>
	<link rel="stylesheet" type="text/css" href="../styles/motdepasseoubliecss.css">
</head>
<body>
	<div class="container">
     <div class="row">
<nav class="navbar navbar-fixed-top navbar-default">
<div class="navbar-header hidden-xs">

<a href="#" class="navbar-brand" style="color:white;">Be Social</a>

</div>
<div class="container">

<ul class="nav navbar-nav navbar-right nav-pills">

	<li><a href="http://localhost/projetDSI/view/index.php" style="color:white;">creér un compte</a></li>
	<li><a href="http://localhost/projetDSI/view/login.php" style="color:white;">se connecter</a></li>

</ul>

</div>

</nav>
</div>
</div>


<div class="row" id="first-element">
<div class="col-xs-12 col-lg-offset-3 col-lg-6 col-lg-offset-3" style="background-color:white;border:solid 1px black;" id="block">
<h3><center style="color:black;">Retrouvez votre compte</center></h3>
<hr>

<form class="form-horizontal col-xs-12" id="s" method="POST">
	
	<p id="guide" style="color:black;">Veuillez saisir votre adresse e-mail et téléphone pour rechercher votre compte.</p>
	<div class="row">
	<div class="form-group col-xs-12 col-lg-6" id="barre">
	<input type="text" name="email" id="email" class="emailortel" placeholder="saisir votre email">
	<input type="text" name="tel" class="emailortel" id="tel" placeholder="saisir votre tel"><br>
	<input type="submit"  style="border: solid 1px lightgrey;" id="valider"  class="valider" name="valider" value="Rechercher" >
    </div>

    	<div class="form-group col-xs-12  col-lg-6" id="marge">
          <input type="text" class="emailortel" id="codeconfirmation" placeholder="tapez le code de confirmation recu"  name="codeconfirmation"></textarea>
		<input type="submit" style="border: solid 1px lightgrey;"  id="forcode" class="valider"  value="Valider">
    </div>
	</div>

</form>

</div>
</div>

</body>
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/motdepasseoubliejs.js"></script>
<script type="text/javascript">

$(function(){
		
		$('#s').submit(function(e){
			e.preventDefault();
            var don=new FormData(document.querySelector('form'));
              $.ajax({
				       url:'http://localhost/projetDSI/controller/mains/newpassword.php',
				       type:"POST",
				       data:don,
				       processData:false,
				       contentType:false,
				       success:function(rep){
				       	if(rep==='true')
				       		window.location="http://localhost/projetDSI/view/choosenewpassword.php?email="+$('#email').val();
				       	 else if(rep==='false')
				       	 	$('#codeconfirmation').css('border','solid 1px red');
				       	
				       }
              });
		});
});
</script>

</html>