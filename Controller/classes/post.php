<?php
abstract class Post{

	use traitSecureData;

	protected $id,$id_poster,$date_post;

    public function __construct(array $data){
 	 
	 	 foreach ($data as $key => $value) {
	 	 	$methodName="set".ucfirst($key);
	 	 	if(method_exists($this,$methodName))
	 	 		  $this->$methodName($value);
	 	}
    }

    public function setId($id){$this->id=$id;}
    public function setId_poster($idposter){$this->id_poster=$idposter;}
    public function setDate_post($datepost){$this->date_post=$datepost;}

    public function getId(){return $this->id;}
    public function getId_poster(){return $this->id_poster;}
    public function getDate_post(){return $this->date_post;}

    public function __toString(){

    	return " id ".$this->id." id_poster ".$this->id_poster." date_post ".$this->date_post." height ".$this->height." width ".$this->width." url ".$this->url.' titre '.$this->titre;
    }

}


?>