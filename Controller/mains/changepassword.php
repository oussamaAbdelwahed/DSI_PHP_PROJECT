<?php
include_once "../../model/databaseconnection.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include_once "../../model/usermanager.php";

if(isset($_POST) AND !empty($_POST['password']) AND isset($_POST['email'])){
$userManager=new UserManager($db);
$password=hash('sha256',$_POST['password']);
$res=$userManager->changePassword($_POST['email'],$password);
if((bool)$res==true)
	echo "benne";
else 
	echo "not benne from elese";
}else{
	echo "not benne";
}

?>