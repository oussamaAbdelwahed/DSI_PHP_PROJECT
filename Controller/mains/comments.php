<?php
include "../../model/databaseconnection.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include "../../model/commentmanager.php";
include '../classes/user.php';
include '../classes/comment.php';
session_start();

if(isset($_SESSION['user']) AND !empty($_SESSION['user'])){
		$commentManager=new CommentManager($db);

		if(isset($_POST['comment']) AND !empty($_POST['comment']) ){

				$array=['id_commenter'=>$_SESSION['user']->getId_user(),'id_post_commented'=>$_POST['idpostcommented'],'type_post_commented'=>$_POST['typepost'],'comment_content'=>$_POST['comment']];
				$comment=new Comment((array)$array);
				$res=$commentManager->save($comment);
				 echo "{\"comment\":\"".htmlspecialchars_decode($_POST['comment'])."\",\"id\":\"".$res."\"}";

		}else if(isset($_POST['action']) AND $_POST['action']=='getnumbercomments'){
			if(isset($_POST['forfriend']) AND $_POST['forfriend']=='true' AND isset($_SESSION['friend'])){
			  echo json_encode($commentManager->countComments($_SESSION['friend']->getId_user()));
			}else{
		      echo json_encode($commentManager->countComments($_SESSION['user']->getId_user()));
		    }
		}else if(isset($_POST['action']) AND $_POST['action']=='getlisteusers'){
           echo json_encode($commentManager->getListUsersCommetingThisPost($_POST['idpost'],$_POST['typepost']));
		}
  }
?>