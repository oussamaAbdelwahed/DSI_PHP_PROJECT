<?php
include_once "../../model/databaseconnection.php";
include "../classes/like.php";
include "../../model/likemanager.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include "../classes/user.php";
session_start();
if(isset($_POST) AND !empty($_POST)){

   $likesManager=new LikeManager($db);
  	echo json_encode($likesManager->getListeLikers($_POST['idpost'],$_POST['typepost']));

}



?>