<?php
include "../../model/databaseconnection.php";
include '../classes/invitation.php';
include "../../model/invitationmanager.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include_once "../classes/user.php";
session_start();

if(isset($_POST['action']) AND $_POST['action']=='nbrinvitations' AND isset($_SESSION['user'])){
	$invitationManager=new InvitationManager($db);
echo $invitationManager->countInvitations($_SESSION['user']->getId_user())["nbr_invitations"];

}
    	   	  


?>