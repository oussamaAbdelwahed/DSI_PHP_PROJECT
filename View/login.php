
<!DOCTYPE html>
<html>
<head>
	<title>Page de connection</title>
    <?php
     require("inc/headerresources.php");
    ?>
	<link rel="stylesheet" type="text/css" href="../styles/pageinscriptioncss.css">
	<link rel="stylesheet" type="text/css" href="../styles/pageconnectioncss.css">
</head>
<body>
<div id="masque">
<div class="container" >
<div class="row">

<nav class="navbar navbar-fixed-top navbar-default">
<div class="navbar-header hidden-xs">

<a href="#" class="navbar-brand" style="color:white;">Be Social</a>

</div>
<div class="container">

<ul class="nav navbar-nav navbar-right nav-pills">

	<li><a class="navitem" href="http://localhost/projetDSI/view/index.php" style="color: white;">creér un compte</a></li>
	<li class="act"><a class="navitem" href="http://localhost/projetDSI/view/login.php" style="color: white;">se connecter</a></li>

</ul>

</div>

</nav>
</div>

<div class="row">
<div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-sm-12 col-xs-12" id="formcontaine">
<div class="row">
 	<h2><center>Se connecter</center></h2>

 </div>
<div class="row">

 <form class="form-horizontal col-lg-offset-1 col-lg-10 col-lg-offset-1 col-xs-12" method="POST" action="../controller/mains/mainlogin.php">
 
 <div class="row marginbottominputs">

 <div class="input-group col-xs-offset-1 col-xs-10 col-xs-offset-1">
  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
  <input type="text" id="email"   name="email" class="form-control" placeholder="Nom d'utilisatuer" value=<?php
   if(isset($_COOKIE['connection'])){
    echo "\"".(explode(",",$_COOKIE['connection']))[0]."\"";
   }
   
  ?>>

</div>
<p class="error-inputs col-lg-offset-1 col-lg-10 col-lg-offset-1 ">Email invalide</p>
</div>

<div class="row">
 
 <div class="input-group col-xs-offset-1 col-xs-10 col-xs-offset-1">
  <span class="input-group-addon" id="basic-addon1"><i class="icon-key" aria-hidden="true"></i></span>
  <input type="password"  id="password" name="password" class="form-control" placeholder="Mot de passe" value=<?php
    if(isset($_COOKIE['connection'])){
       echo "\"".(explode(",",$_COOKIE['connection']))[1]."\"";
    }
  ?>>

</div>
<?php if(isset($_GET['e']) AND $_GET['e']=='true'){

echo "<div class='alert alert-dismissible alert-danger col-xs-offset-1 col-xs-10 col-xs-offset-1'>Email Ou Mot De Passe Invalide</div>";
}?>
  <p class="error-inputs col-lg-offset-1 col-lg-10 col-lg-offset-1">Mot de passe invalide</p>

</div>


<div class="row">

<div class="checkbox col-lg-offset-1 col-lg-10 col-lg-offset-1" id="checkbox">
<label><input type="checkbox" name="check" value="true"> <span id="textlabel">Se souvener de moi</span></label>
</div>	
<div class="col-lg-offset-1 col-lg-10 col-lg-offset-1"><a class="likelabel" href="http://localhost/projetDSI/view/index.php">Créer un Compte</a></div>
<div class="col-lg-offset-1 col-lg-10 col-lg-offset-1"><a class="likelabel" href="http://localhost/projetDSI/view/motdepasseoublie.php">M.D.P oublié</a></div>

</div>

<div class="row">
    <div class="col-lg-offset-4 col-lg-4 col-lg-offset-4">
	<center><input type="submit" name="envoyer" value="Connexion" class="btn bnt-success" id="submitting"></center>
</div>	
</div>

</form>
</div>
</div>

</div>
</div>
</div>

<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/jquery.color.js"></script>
<script type="text/javascript" src="../scripts/forindex.js"></script>
<script type="text/javascript" src="../scripts/fortestinginputs.js"></script>
<script type="text/javascript" src="../scripts/controllogininputs.js"></script>

</body>
</html>