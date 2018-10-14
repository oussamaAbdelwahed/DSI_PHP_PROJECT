<?php
include "../../model/databaseconnection.php";
include "../inc/traitforchildspost.php";
include "../classes/traitsecuredata.php";
include "../classes/savableinterface.php";
include "../classes/post.php";
include "../classes/statuspost.php";
include "../classes/videopost.php";
include "../classes/imagepost.php";
include "../../model/postmanager.php";
include '../classes/user.php';
session_start();
if(isset($_POST) AND !empty($_POST) AND isset($_SESSION['user'])){
	 $postManager=new PostManager($db);
	if(isset($_POST['action']) AND $_POST['action']=='getnextpage'){
       $res=$postManager->getNextPageAcceuil($_SESSION['user']->getId_user(),(int)$_POST['idlaststatus'],(int)$_POST['idlastimage'],(int)$_POST['idlastvideo']);
       echo json_encode($res);
	}else{
	  $array=$postManager->getTopPostsForAcceuil((int)$_SESSION['user']->getId_user());
	  header('Content-type:application/json; charset=utf-8');
	  echo json_encode($array);
   }
}else{
	//code test update or delete
   // $postManager=new PostManager($db); 
   // $sp=new StatusPost(['id'=>45,'content'=>"updated content io"]);
   // $postManager->delete($sp,'status');
	echo "error";
}
?>