<?php
include "../model/databaseconnection.php";
include_once '../controller/classes/traitsecuredata.php';
include_once '../controller/classes/savableinterface.php';
include "../model/usermanager.php";
include '../controller/classes/user.php';
session_start();

if(isset($_GET['id']) AND ctype_digit($_GET['id'])){

	$userManager=new UserManager($db);
	$idFriend=$_GET['id'];
	$u=$userManager->getUser($idFriend);
	if($u !=false){
	$_SESSION['friend']=$u;
	    header('Location:friend.php');
	}else{
		header('Location:profile.php');
	}
}else{
header('Location:profile.php');
}
?>