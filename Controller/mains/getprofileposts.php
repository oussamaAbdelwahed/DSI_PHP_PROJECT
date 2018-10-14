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

if(isset($_POST) AND !empty($_POST)){
	$postManager=new PostManager($db);
	$array=$postManager->getTopPosts((int)$_POST['id']);
	header('Content-type:application/json; charset=utf-8');
	echo json_encode($array);
}else{
	//code test update or delete
   // $postManager=new PostManager($db); 
   // $sp=new StatusPost(['id'=>45,'content'=>"updated content io"]);
   // $postManager->delete($sp,'status');
	echo "error";
}
?>