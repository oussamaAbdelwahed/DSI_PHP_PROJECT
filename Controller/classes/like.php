<?php
class Like{

protected $id_liker,$id_post_liked,$type_post_liked;

public function __construct(array $data){

	foreach ($data as $key => $value) {
	 $methodname="set".ucfirst($key);
	 if(method_exists($this,$methodname))
	 	$this->$methodname($value);
	}

}

public function setId_liker($id){$this->id_liker=$id;}

public function setId_image_liked($id){
	$this->id_post_liked=$id;
	$this->type_post_liked="image";
}

public function  setId_video_liked($id){
	$this->id_post_liked=$id;
	$this->type_post_liked="video";
}

public function setId_status_liked($id){

 $this->id_post_liked=$id;
 $this->type_post_liked="status";

}
public function getId_liker(){return $this->id_liker;}
public function getType_post_liked(){return $this->type_post_liked;}
public function getId_post_liked(){return $this->id_post_liked;}




}

?>