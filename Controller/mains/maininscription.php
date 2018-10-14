<?php
include_once "../../model/databaseconnection.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include_once "../../model/usermanager.php";
include_once "../classes/user.php";
include_once "../classes/image.php";

if(isset($_POST) AND !empty($_POST) AND isset($_FILES) AND !empty($_FILES)){
        
		$user=new User($_POST);

		if(!User::checkEmail($_POST['email']) OR !User::checkPassword($_POST['password'])){

		  if(!User::checkEmail($_POST['email']))
              header('Location:../../view/index.php?ermail=true');

		  if(!User::checkPassword($_POST['password']))
              header('Location:../../view/index.php?erpassword=true');
		  
	   }else{

		$userManager=new UserManager($db);
		$nameofminiature=md5(uniqid());

		if(Image::haveGoodSize()){

		  $result=Image::createMiniature($nameofminiature);
		  Image::createSpecificImage($nameofminiature,300,300);
		  $user->setPhoto('http://localhost/projetdsi/miniatures/'.$result);
		  $userManager->save($user);
		  echo $_POST['annee']."-".$_POST['mois'].'-'.$_POST['jours'];
		  header('Location:../../view/login.php');

		}else{
			echo "havent good size";
         header('Location:../../view/index.php?image=true');

		}
	}
}

?>