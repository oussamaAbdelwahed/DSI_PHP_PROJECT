<?php
include "../../model/databaseconnection.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include "../../model/likemanager.php";
include "../classes/user.php";

session_start();

if(isset($_POST) AND !empty($_POST) AND isset($_SESSION['user'])){
	  $likemanager=new LikeManager($db);
	if(isset($_POST['action'])  AND $_POST['action']=='countlikes' AND isset($_POST['idfriends'])){
         echo json_encode($likemanager->countLikesForAcceuil((array)$_POST['idfriends']));
	}else if(isset($_POST['ifhelikethis']) AND $_POST['ifhelikethis']=='true' AND isset($_POST['idfriends']) ){
		$arrayfriends=implode(',',(array)$_POST['idfriends']);
		 echo json_encode($likemanager->WhatPostsLikeInAcceuil($_SESSION['user']->getId_user(),$arrayfriends));
	}
}


?>