<?php
$ermail=$erpassword=$erimage="";
if(isset($_GET['ermail']))
$eremail="email invalide";
if(isset($_GET['erpassword']))
$erpassword="mot de passe invalide";
if(isset($_GET['image']))
$erimage="image de grande taille";
?>