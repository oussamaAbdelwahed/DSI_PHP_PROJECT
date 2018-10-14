<?php
include "../../model/databaseconnection.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include "../../model/commentmanager.php";
include '../classes/user.php';
include '../classes/comment.php';
session_start();

if(isset($_SESSION['user']) AND !empty($_SESSION['user']) AND isset($_POST['action'])){
		$commentManager=new CommentManager($db);
		
		if($_POST['action']=='getnumbercomments')
		  echo json_encode($commentManager->countCommentsForAcceuil($_SESSION['user']->getId_user(),$_POST['idfreinds']));
}
?>