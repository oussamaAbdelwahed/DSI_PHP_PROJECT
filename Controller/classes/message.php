<?php


class Message{

	use traitSecureData;
	use childpost;

	protected $id_message,$date_post_message,$id_sender,$id_receiver,$message_content;

    public function __construct(array $data){

    	foreach ($data as $key => $value) {
    		$methodname="set".ucfirst($key);
    		if(method_exists($this, $methodname))
    			$this->$methodname($value);
    	}
    }

    public function setId_message($id){$this->id_message=$id;}
    public function setDate_post_message($date){$this->date_post_message=$date;}
    public function setId_sender($id){$this->id_sender=$id;}
    public function setId_receiver($id){$this->id_receiver=$id;}
    public function setMessage_content($message){$this->message_content=$this->secureData($message);}

    public function getId_message(){return $this->id_message;}
    public function getDate_post_message(){return $this->date_post_message;}
    public function getId_sender(){return $this->id_sender;}
    public function getId_receiver(){return $this->id_receiver;}
    public function getMessage_content(){return $this->message_content;}


	
}
?>