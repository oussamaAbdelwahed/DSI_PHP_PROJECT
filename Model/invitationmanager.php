<?php
class InvitationManager{

private $db;

public function __construct($db){
	$this->db=$db;
}

public function saveInvitation(Invitation $invitation){
	try{
		$request=$this->db->prepare("INSERT INTO invitation(id_inviter,id_invited,date_invitation) VALUES(:idinviter,:idinvited,NOW())");
		$request->bindValue(':idinviter',(int)$invitation->getInviter(),PDO::PARAM_INT);
		$request->bindValue(':idinvited',(int)$invitation->getInvited(),PDO::PARAM_INT);
		$request->execute();
	}catch(PDOException $e){
		return false;
	}     
}


public function deleteInvitation(Invitation $invitation){
	try{
		$request=$this->db->prepare("DELETE FROM  invitation WHERE id_inviter=:id_inviter AND id_invited=:id_invited");

		$request->bindValue(':id_inviter',(int)$invitation->getInviter(),PDO::PARAM_INT);
		$request->bindValue(':id_invited',(int)$invitation->getInvited(),PDO::PARAM_INT);
		$request->execute();
	}catch(PDOException $e){
		return false;
	}
}


public function getInvitations($iduser){
  try{
	  	$request=$this->db->prepare("SELECT i.id_invited,u.id_user AS id_inviter,u.nom,u.prenom,u.photo FROM invitation i JOIN users u ON i.id_inviter=u.id_user WHERE id_invited=:id_user AND i.accepted=0");
	  	$request->bindValue(":id_user",(int)$iduser,PDO::PARAM_INT);
	    $request->execute();
	    return (array)$request->fetchAll(PDO::FETCH_ASSOC);
  }catch(PDOException $e){
  		return false;
  }
}


public function acceptInvitation(Invitation $invitation){
  try{
	  	$request=$this->db->prepare("UPDATE invitation SET accepted=1  WHERE id_inviter=:id_user AND id_invited=:id_friend");
	  	$request->bindValue(":id_user",(int)$invitation->getInviter(),PDO::PARAM_INT);
	  	$request->bindValue(":id_friend",(int)$invitation->getInvited(),PDO::PARAM_INT);
	    $request->execute();

	    $request1=$this->db->prepare("INSERT INTO  friends VALUES(:id_user,:id_friend)");
	  	$request1->bindValue(":id_user",(int)$invitation->getInvited(),PDO::PARAM_INT);
	  	$request1->bindValue(":id_friend",(int)$invitation->getInviter(),PDO::PARAM_INT);
	    $request1->execute();

	        $request1=$this->db->prepare("INSERT INTO  friends VALUES(:id_user,:id_friend)");
	  	$request1->bindValue(":id_user",(int)$invitation->getInviter(),PDO::PARAM_INT);
	  	$request1->bindValue(":id_friend",(int)$invitation->getInvited(),PDO::PARAM_INT);
	    $request1->execute();

  }catch(PDOException $e){
  		return false;
  }
}


public function doesHeIsInvitedByMe(Invitation $invitation){
	try{
		$request=$this->db->prepare("SELECT accepted FROM invitation WHERE id_inviter=:idinviter AND id_invited=:idinvited");
		$request->bindValue(':idinviter',(int)$invitation->getInviter(),PDO::PARAM_INT);
		$request->bindValue(':idinvited',(int)$invitation->getInvited(),PDO::PARAM_INT);
		$request->execute();
		$array=$request->fetch(PDO::FETCH_ASSOC);
		if(empty($array))
			return 'null';
		
		return ($array['accepted']=='1') ? 'true' :'false';
	}catch(PDOException $e){
		return false;
	}
}


public function countInvitations($iduser){

	try{
		$request=$this->db->prepare("SELECT COUNT(id_invited) AS nbr_invitations FROM invitation WHERE id_invited=:id_user_connected AND accepted=0");
		$request->bindValue(":id_user_connected",(int)$iduser,PDO::PARAM_INT);
		$request->execute();
		return (array)$request->fetch(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
      return false;
	}
}


}
?>