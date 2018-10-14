<?php

class ConnectionInfo{

private $id_user,$date_before_last_connection,$date_last_connection;

public function __construct(array $data){


       foreach ($data as $key => $value) {
       	 $methodName="set".ucfirst($key);
         if(method_exists($this,$methodName))
       	   $this->$methodName($value);
         }
}

public function setId_user($iduser){
	$this->id_user=$iduser;
}
public function setDate_before_last_connection($dateblc){
	$this->date_before_last_connection=$dateblc;
}
public function setDate_last_connection($dlc){
	$this->date_last_connection=$dlc;
}


public function getId_user(){return $this->id_user;}
public function getDate_before_last_connection(){return $this->date_before_last_connection;}
public function getDate_last_connection(){return $this->date_last_connection;}




	
}

?>