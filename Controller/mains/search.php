<?php
include_once "../../model/databaseconnection.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include "../classes/user.php";
include '../../model/usermanager.php';
session_start();

if(isset($_POST) AND !empty($_POST['content'])){
	$userManager=new UserManager($db);
	echo json_encode($userManager->searchForUsers($_POST['content']));
}
?>