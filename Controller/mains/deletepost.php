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

if(isset($_POST['idpost']) AND isset($_POST['tablename'])){

	   $postManager=new PostManager($db); 
	   $res=$postManager->delete($_POST['tablename'],$_POST['idpost']);

}

?>