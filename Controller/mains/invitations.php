<?php
include "../../model/databaseconnection.php";
include '../classes/invitation.php';
include "../../model/invitationmanager.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include_once "../classes/user.php";
session_start();
if(isset($_POST['action']) AND $_POST['action']=='nbrinvitations' AND isset($_SESSION['user'])){
    	   	   echo $invitationManager->countInvitations($_SESSION['user']->getId_user());
}

if(isset($_POST) AND !empty($_POST) AND isset($_SESSION['user'])){
	 $invitationManager=new InvitationManager($db);

    if(isset($_POST['action'])){

    	   

			if($_POST['action']=='inviter'){
			   $invitation=new Invitation($_SESSION['user']->getId_user(),$_POST['invited']);
			   $invitationManager->saveInvitation($invitation);
			}else if($_POST['action']=='supprimer'){
			   $invitation=new Invitation($_SESSION['user']->getId_user(),$_POST['invited']);
			   $invitationManager->deleteInvitation($invitation);		
			}else if($_POST['action']=='question'){
				 $invitation=new Invitation($_SESSION['user']->getId_user(),$_POST['invited']);
				 echo $invitationManager->doesHeIsInvitedByMe($invitation);
			}else if($_POST['action']=='listeinvitations'){
                   echo json_encode($invitationManager->getInvitations($_SESSION['user']->getId_user()));
			}else if($_POST['action']=='acceptinvi'){
				$invitationManager->acceptInvitation(new Invitation($_POST['idinviter'],$_SESSION['user']->getId_user()));
			}else if($_POST['action']=='declineinvi'){
				$invitationManager->deleteInvitation(new Invitation($_POST['idinviter'],$_SESSION['user']->getId_user()));
			}
   }
}
?>