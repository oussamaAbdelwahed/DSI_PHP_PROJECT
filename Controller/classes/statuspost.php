<?php

class StatusPost extends Post{

protected $content;

public function setContent($con){$this->content=$this->secureData($con);}
public function getContent(){return $this->content;}

	
}

?>