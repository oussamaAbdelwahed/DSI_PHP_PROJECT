<?php

class UserManager implements Savable{

	protected $db;

	public function __construct($db){
		$this->db=$db;
	}


	private function emailExist(User $user){

      $request=$this->db->prepare("SELECT email FROM users WHERE email =:email");
      $request->bindValue(':email',$user->getEmail(),PDO::PARAM_STR);
      $request->execute();

      return  (bool)$request->fetchColumn();
	}




	public function save($user){

        if($this->emailExist($user))
        	return false;
        try{

            $request=$this->db->prepare("INSERT INTO users(nom,prenom,email,password,forgot_password,photo,birthday,sex) VALUES (:nom,:prenom,:email,:pass,:forgpass,:photo,:birthday,:sex)");

         $request->bindValue(':nom',$user->getNom(),PDO::PARAM_STR);
         $request->bindValue(':prenom',$user->getPrenom(),PDO::PARAM_STR);
         $request->bindValue(':email',$user->getEmail(),PDO::PARAM_STR);
         $request->bindValue(':pass',$user->getPassword(),PDO::PARAM_STR);
         $request->bindValue(':forgpass',uniqid(),PDO::PARAM_STR);
         $request->bindValue(':photo',$user->getPhoto(),PDO::PARAM_STR);


        if(!empty($user->getBirthday()))
            $request->bindValue(":birthday",$user->getBirthday(),PDO::PARAM_STR);
        else
        	 $request->bindValue(":birthday","0000-00-00",PDO::PARAM_STR);
        
          $request->bindValue(':sex',$user->getSex(),PDO::PARAM_STR);
          $request->execute();
          $idUserSaved=$this->db->lastInsertId();
          $request1=$this->db->prepare("INSERT INTO friends VALUES(:id,:id)");
          $request1->bindValue(':id',(int)$idUserSaved,PDO::PARAM_INT);
          $request1->execute();

         return (bool)$request->rowCount();
       }catch(PDOException $e){
        return false;
       }
	}

  public function changePassword($email,$pass){
    try{
      $request=$this->db->prepare("UPDATE users SET password=:pass,forgot_password=:fp WHERE email=:email");
      $request->bindValue(':pass',$pass,PDO::PARAM_STR);
      $request->bindValue(':fp',uniqid(),PDO::PARAM_STR);
      $request->bindValue(':email',$email,PDO::PARAM_STR);
      $request->execute();
      return (bool)$request->rowCount();
    }catch(PDOException $e){
        return false;
    }
  }



  public function changeNom($email,$nom){

       try{
      $request=$this->db->prepare("UPDATE users SET nom=:nom WHERE email=:email");
      $request->bindValue(':nom',$nom,PDO::PARAM_STR);
      $request->bindValue(':email',$email,PDO::PARAM_STR);
      $request->execute();
      if((bool)$request->rowCount()==true){
        return $nom;
       }
    }catch(PDOException $e){
        return false;
    }
  }

    public function changePrenom($email,$prenom){
       try{
      $request=$this->db->prepare("UPDATE users SET prenom=:prenom WHERE email=:email");
      $request->bindValue(':prenom',$prenom,PDO::PARAM_STR);
      $request->bindValue(':email',$email,PDO::PARAM_STR);
      $request->execute();
      if((bool)$request->rowCount()==true){
        return $prenom;
      }
    }catch(PDOException $e){
        return false;
    }
  }


  public function changeProfilePhoto($email,$photo){
    try{
      $request=$this->db->prepare("UPDATE users SET photo=:photo WHERE email=:email");
      $request->bindValue(':photo',$photo,PDO::PARAM_STR);
      $request->bindValue(':email',$email,PDO::PARAM_STR);
      $request->execute();
      return (bool)$request->rowCount();
    }catch(PDOException $e){
        return false;
    }
  }



public function changeBirthday($email,$birthday){
    try{
      $request=$this->db->prepare("UPDATE users SET birthday=:birthday WHERE email=:email");
      $request->bindValue(':birthday',$birthday);
      $request->bindValue(':email',$email,PDO::PARAM_STR);
      $request->execute();
      return (bool)$request->rowCount();
    }catch(PDOException $e){
        return false;
    }
}

public function changeSex($email,$sex){
    try{
      $request=$this->db->prepare("UPDATE users SET sex=:sex WHERE email=:email");
      $request->bindValue(':sex',$sex,PDO::PARAM_STR);
      $request->bindValue(':email',$email,PDO::PARAM_STR);
      $request->execute();
      return (bool)$request->rowCount();
    }catch(PDOException $e){
        return false;
    }
}


	public function login($user){
       $request=$this->db->prepare('SELECT * FROM users WHERE email=:email AND password=:password');
       $request->bindValue(':email',$user->getEmail(),PDO::PARAM_STR);
       $request->bindValue(':password',$user->getPassword(),PDO::PARAM_STR);
       $res=$request->execute();
         $arrayu=$request->fetch(PDO::FETCH_ASSOC);

          if(!empty($arrayu))
            return new User($arrayu);

       return false;
}

public function update($idUser,$PostType){


}

public function delete($idUser,$postType){



}

public function getUser($id){
  try{
    $request=$this->db->prepare('SELECT * FROM users WHERE id_user=:id');
    $request->bindValue(':id',(int)$id,PDO::PARAM_INT);
    $request->execute();
    return new User((array)$request->fetch(PDO::FETCH_ASSOC));
  }catch(PDOException $e){
    return false;
  }
}


public static function getUserByEmail($email){
  global $db;
  try{
    $request=$db->prepare('SELECT * FROM users WHERE email=:email');
    $request->bindValue(':email',$email,PDO::PARAM_STR);
    $request->execute();
    return (array)$request->fetch(PDO::FETCH_ASSOC);
  }catch(PDOException $e){
    return false;
  }
}


public function getCodeConfirmation($email){
  try{
    $request=$this->db->prepare('SELECT forgot_password AS code FROM users WHERE email=:email');
    $request->bindValue(':email',$email,PDO::PARAM_STR);
    $request->execute();
    $array=(array)$request->fetch(PDO::FETCH_ASSOC);
    return $array['code'];
    
  }catch(PDOException $e){
    return false;
  }
}


public function sendCodeConfirmation($code,$tel){

  $username = "oussama-abdelwahed@hotmail.fr";
  $hash = "475a4b2055d2a21f5f2efb766b02dca6795088cbfa4bed073cee1b94562ca89e";
  // Config variables. Consult http://api.txtlocal.com/docs for more info.
  $test = "0";
  // Data for text message. This is the text message data.
  $sender = "Be Social"; // This is who the message appears to be from.
  $numbers = "+216".(int)$tel; // A single number or a comma-seperated list of numbers
  $message = "Be Social : Votre Code De Confirmation est ".$code;
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
  $ch = curl_init('http://api.txtlocal.com/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  curl_close($ch);

  return $result;
}


public function searchForUsers($content){
  try{
      // $request=$this->db->prepare("SELECT CONCAT(u.nom,' ',u.prenom) AS nom_prenom,u.id_user,u.photo  FROM users u WHERE u.nom LIKE :content OR UCASE(SUBSTR(nom,1,1)) LIKE UCASE(SUBSTR(:content,1,1))  OR u.prenom  LIKE :content OR UCASE(SUBSTR(prenom,1,1)) LIKE UCASE(SUBSTR(:content,1,1))");
    $request=$this->db->prepare("SELECT CONCAT(u.nom,' ',u.prenom) AS nom_prenom,u.id_user,u.photo FROM users u WHERE u.nom LIKE :content OR u.prenom LIKE :content");
    $request->bindValue(':content',$content."%",PDO::PARAM_STR);
    $request->execute();
    return  (array)$request->fetchAll(PDO::FETCH_ASSOC);
  }catch(PDOException $e){
     return  false;
  }
}

}
?>