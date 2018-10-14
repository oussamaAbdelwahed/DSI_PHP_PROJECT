<?php
class User{

use traitSecureData;

protected $id_user,$nom,$prenom,$birthday,$email,$password,$photo,$sex;

public function hydrater(array $data){

	foreach ($data as $key => $value){

		$value=$this->secureData($value);
		$methodname="set".ucfirst($key);

		if(method_exists($this,$methodname))
			$this->$methodname($value);
	}
}


public function __construct(array $data){

  $this->hydrater($data);

  if(!empty($data['jours']) AND !empty($data['annee']) AND !empty($data['mois']))
		$this->setBirthday($data['annee']."-".$data['mois']."-".$data['jours']);
}



public function getNom(){return $this->nom;}
public function getPhoto(){return $this->photo;}
public function getId_user(){return $this->id_user;}
public function getPrenom(){return $this->prenom;}
public function getEmail(){return $this->email;}
public function getPassword(){return $this->password;}
public function getSex(){return $this->sex;}
public function getBirthday(){return $this->birthday;}


public function setNom($nom){$this->nom=$nom;}
public function setId_user($id){$this->id_user=$id;}
public function setPhoto($ph){$this->photo=$ph;}
public function setPrenom($prenom){$this->prenom=$prenom;}
public function setSex($sex){$this->sex=$sex;}
public function setEmail($email){$this->email=$email;}
public function setPassword($password){$this->password=hash('sha256',$password);}
// public function setJours($jours){$this->birthday.=$jours;}
// public function setMois($mois){$this->birthday.="-".$mois;}
// public function setAnnee($annee){$this->birthday="-".$annee;}
public function setBirthday($bir){$this->birthday=$bir;}


public static function  checkEmail($email){

       return (bool)filter_var($email,FILTER_VALIDATE_EMAIL);

}

public static function checkPassword($password){
         return (bool)(preg_match("#^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$#",self::secureData($password)));
	     	
}


public function __toString(){
	return "id ".$this->id_user."nom ".$this->nom." prenom ".$this->prenom." sex = ".$this->sex." email ".$this->email." password ".$this->password." date de naissance ".$this->birthday.' photo '.$this->photo;
}



}

?>