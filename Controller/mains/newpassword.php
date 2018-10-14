<?php
include_once "../../model/databaseconnection.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include_once "../../model/usermanager.php";
include_once "../classes/user.php";
session_start();

if(isset($_POST) AND !empty($_POST)){

  if((isset($_POST['email']) AND !empty($_POST['email'])) AND (isset($_POST['tel']) AND !empty($_POST['tel'])) AND (!isset($_POST['codeconfirmation']) OR empty($_POST['codeconfirmation']))){
	$userManager=new UserManager($db);
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$code=$userManager->getCodeConfirmation($email);

	$_SESSION['codeconfirmation']=$code;
	$res=$userManager->sendCodeConfirmation($code,$tel);
}else if(isset($_POST['codeconfirmation']) AND isset($_SESSION['codeconfirmation'])){

	if($_POST['codeconfirmation']==$_SESSION['codeconfirmation'])
		echo "true";
	else
		echo "false";
		//header('Location:http://localhost/projetDSI/view/motdepasseoublie.php?error=falsecode');
}
}
?>