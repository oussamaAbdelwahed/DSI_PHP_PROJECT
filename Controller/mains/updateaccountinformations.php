<?php
include_once "../../model/databaseconnection.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include_once "../../model/usermanager.php";
include_once "../classes/user.php";
include_once "../classes/image.php";
include_once "../classes/image.php";

session_start();

if(isset($_POST) AND (!empty($_POST) OR isset($_FILES)) AND isset($_SESSION['user'])){
	$userManager=new UserManager($db);
	$user=new User([]);

  if(isset($_POST['nom']) AND !empty($_POST['nom'])){
  	echo $userManager->changeNom($_SESSION['user']->getEmail(),$user->secureData($_POST['nom']));
  }else if(isset($_POST['prenom']) AND !empty($_POST['prenom'])){
    echo $userManager->changePrenom($_SESSION['user']->getEmail(),$user->secureData($_POST['prenom']));
  }else if(isset($_POST['password']) AND !empty($_POST["password"])){
    echo $userManager->changePassword($_SESSION['user']->getEmail(),hash('sha256',$user->secureData($_POST['password'])));
  }else if(isset($_POST['sex']) AND !empty($_POST['sex'])){
  	 echo $userManager->changeSex($_SESSION['user']->getEmail(),$_POST['sex']);
  }else if(isset($_POST['birthday']) AND !empty($_POST['birthday'])){
  	echo $userManager->changeBirthday($_SESSION['user']->getEmail(),$_POST['birthday']);
  }else if(isset($_FILES['file'])){
   $nameofminiature=md5(uniqid());
   $urlofminiature=Image::createMiniature($nameofminiature);
   $urlof300300=Image::createSpecificImage($nameofminiature,300,300);
   $userManager->changeProfilePhoto($_SESSION['user']->getEmail(),"http://localhost/projetDSI/miniatures/".$urlofminiature);
     echo "http://localhost/projetDSI/miniatures/".$urlofminiature;
  }

}
?>