<?php
include "../../model/databaseconnection.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include "../../model/likemanager.php";
include "../classes/user.php";

session_start();

if(isset($_POST) AND !empty($_POST) AND isset($_SESSION['user'])){

  $url=$_SERVER['HTTP_REFERER'];
  $motif=strrchr($url,"/");
  $callerPage=explode("/",$motif)[1];

  $likemanager=new LikeManager($db);

if(isset($_POST['userid']) AND !empty($_POST['userid']) AND $callerPage!="friend.php"){
     echo json_encode($likemanager->countLikesForProfile($_POST['userid']));
}else if(isset($_POST['ifhelikethis']) AND $_POST['ifhelikethis']=='true' AND isset($_SESSION['user']) AND $callerPage!="friend.php"){
	      echo json_encode($likemanager->WhatPostsLikeInProfile($_SESSION['user']->getId_user()));
 }else if((($callerPage=="friend.php") OR ($callerPage=='acceuil.php')) AND isset($_POST['userid']) AND !empty($_POST['userid'])){
         echo json_encode($likemanager->countLikesForFriend($_POST['userid']));
 }else if(isset($_POST['ifhelikethis']) AND $_POST['ifhelikethis']=='true' AND isset($_SESSION['friend'])){
 		 echo json_encode($likemanager->WhatPostsLikeInFriendProfile($_SESSION['user']->getId_user(),$_SESSION['friend']->getId_user()));
 	}
 	
}
?>