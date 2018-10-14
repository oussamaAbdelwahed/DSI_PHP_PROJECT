<?php
try{
$db=new PDO('mysql:host=localhost;dbname=besocial','root','');
}catch(Exception $e){
	die("erreur de base de donnes");
}
?>