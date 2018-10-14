<?php
include_once "../../model/databaseconnection.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include_once "../../model/usermanager.php";
include_once "../classes/user.php";
include_once "../classes/image.php";
session_start();
if(isset($_POST) AND !empty($_POST)){
	if(isset($_POST['check'])){
		setcookie("connection",$_POST['email'].",".$_POST['password'],time()+122333870);
	}
  
  $userManager=new UserManager($db);
  $user=new User($_POST);
  $userFromLogin=$userManager->login($user);
  if($userFromLogin!=false){
  	 $_SESSION['user']=$userFromLogin;
          header('Location:../../view/acceuil.php');
  }else{
          header("Location:../../view/login.php?e=true");
  }

}

?>