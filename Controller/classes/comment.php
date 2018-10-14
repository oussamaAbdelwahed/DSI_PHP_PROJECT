<?php
class Comment{
	
	use traitSecureData;

	protected $id_comment,$date_post_comment,$id_commenter,$id_post_commented,$type_post_commented,$comment_content;

     public function __construct(array $arrayFromDb){

       foreach ($arrayFromDb as $key => $value) {
       	 $methodName="set".ucfirst($key);
         if(method_exists($this,$methodName))
       	   $this->$methodName($value);
         }
    }


	public function setId_comment($id){
		$this->id_comment=$id;
	}

    public function setDate_post_comment($datepc){
       $this->date_post_comment=$datepc;
    }

    public function setId_commenter($ic){
    	$this->id_commenter=$ic;
    }

    public function setId_post_commented($idpc){
         $this->id_post_commented=$idpc;
    }

    public function setType_post_commented($tpc){
    	 $this->type_post_commented=$tpc;
    }

    public function setComment_content($newcomment){
       $this->comment_content=$this->secureData($newcomment);
	}

	public function getId_comment(){return (int)$this->id_comment;}
	public function getDate_post_comment(){return $this->date_post_comment;}
	public function getId_commenter(){return (int)$this->id_commenter;}
	public function getId_post_commented(){return (int)$this->id_post_commented;}
	public function getType_post_commented(){return $this->type_post_commented;}
	public function getComment_content(){return $this->comment_content;}

}
?>