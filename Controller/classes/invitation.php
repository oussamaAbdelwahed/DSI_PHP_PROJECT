<?php
class Invitation{
private $inviter,$invited,$date_invitation;

public function __construct($inviter,$invited){
	$this->inviter=$inviter;
	$this->invited=$invited;
}

public function getInviter(){return $this->inviter;}
public function getInvited(){return $this->invited;}
public function getDateInvitation(){return $this->date_invitation;}

public function setDateInvitation($date){$this->date_invitation=$date;}
public function setInviter($inviter){$this->inviter=$inviter;}
public function setInvited($invited){$this->invited=$invited;}


}
?>