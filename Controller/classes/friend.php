<?php


class Friend extends User{
use traitSecureData;

protected $id_friend;

public function __construct(array $data){


       foreach ($data as $key => $value) {
       	 $methodName="set".ucfirst($key);
         if(method_exists($this,$methodName))
       	   $this->$methodName($value);
         }
}

public function getId_friend(){return $this->id_friend;}
public function setId_friend($idf){$this->id_friend=$idf;}


}

?>