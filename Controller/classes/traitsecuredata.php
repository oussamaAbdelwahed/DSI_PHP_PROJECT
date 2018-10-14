<?php

trait traitSecureData{

	public function secureData($data){

		$data=trim($data);
		$data=stripslashes($data);
		return htmlspecialchars($data);
	}

	public function DateNow(){
      return date('Y-m-d');
	}

	public function getDateTimeNow(){
       return date('Y-m-d H:i:s');
	}
}

?>