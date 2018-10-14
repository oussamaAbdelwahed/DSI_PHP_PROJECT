<?php
include "../../model/databaseconnection.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include "../../model/commentmanager.php";
//include '../classes/user.php';
include '../classes/comment.php';
session_start();
if(isset($_POST) AND !empty($_POST)){

	    $commentManager=new CommentManager($db);

		if(!empty($_POST['idcomment']) AND !isset($_POST['update'])){
			$commentManager->delete($_POST['idcomment'],"com");
		}else if(isset($_POST['update']) AND $_POST['update']=='true'){
			$commentManager->update($_POST['idcomment'],$_POST['comment']);
			
		}
}
?>