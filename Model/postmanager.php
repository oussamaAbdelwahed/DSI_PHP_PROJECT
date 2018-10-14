<?php
class PostManager implements Savable{

   protected $db,$tableName;

	public function __construct($db,$tableName=""){

		$this->db=$db;
		$this->tableName=$tableName;
	}

	public function save($post){

		try{
			$request="INSERT INTO $this->tableName(url,titre,id_poster,date_post) VALUES(:url,:titre,:id_poster,:date_post)";
			$request=$this->db->prepare($request);
			$request->bindValue(':url',$post->getUrl(),PDO::PARAM_STR);

			if(!empty($post->getTitre()))
				$request->bindValue(':titre',$post->getTitre(),PDO::PARAM_STR);
			else
				$request->bindValue(':titre'," ",PDO::PARAM_STR);

			$request->bindValue(':id_poster',$post->getId_poster(),PDO::PARAM_INT);
			$request->bindValue(':date_post',$post->getDate_post(),PDO::PARAM_STR);

			$request->execute();
			return (bool)$request->rowCount();

		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
		
	}

 public function saveStatus($post){

       try{
         $request=$this->db->prepare("INSERT INTO status_post(id_poster,date_post,content) VALUES(:id_poster,:date_post,:content)");
         $request->bindValue(":id_poster",(int)$post->getId_poster(),PDO::PARAM_INT);
         $request->bindValue(":date_post",date("Y-m-d H:i:s"));
         $request->bindValue(":content",$post->getContent(),PDO::PARAM_STR);
         $request->execute();
         return (bool)$request->rowCount();
       }catch(PDOException $e){
     	  die('');
     	  return false;
       }  
 }


function sortTopPosts(&$array){
   $i=0;
	  while($i <count($array)){
	     for($j=$i;$j<count($array);$j++){
	         if($array[$j]['date_post'] > $array[$i]['date_post']){
	         	$tmp=$array[$j];
	         	$array[$j]=$array[$i];
	         	$array[$i]=$tmp;
	         }
	     }
	     $i++;
	 }
}

public function getTopPosts($idUser){

	  try{
	  	$request1=$this->db->prepare("SELECT * FROM status_post WHERE id_poster=:id  ORDER BY id DESC LIMIT 10");
	  	$request1->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
	  	$request1->execute();
        $array1=$request1->fetchAll(PDO::FETCH_ASSOC);


        $request2=$this->db->prepare("SELECT * FROM image_post WHERE id_poster=:id ORDER BY id DESC LIMIT 10");
        $request2->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
        $request2->execute();
        $array2=$request2->fetchAll(PDO::FETCH_ASSOC);


        $request3=$this->db->prepare("SELECT * FROM video_post WHERE id_poster=:id  ORDER BY id DESC LIMIT 10");
        $request3->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
        $request3->execute();
        $array3=$request3->fetchAll(PDO::FETCH_ASSOC);

        $arrayPosts=array_merge($array1,$array2,$array3);
        $this->sortTopPosts($arrayPosts);

       return $arrayPosts;
	  }catch(PDOException $e){
         die();
         return false;
	  }
}

public function getTopPostsForAcceuil($idUser){

	  try{
	  	$request1=$this->db->prepare("SELECT i.id,i.content,i.id_poster,i.date_post,i.type,u.photo,u.nom,u.prenom FROM status_post i JOIN friends f ON i.id_poster=f.id_friend AND f.id_user=:id JOIN users u ON f.id_friend=u.id_user ORDER BY i.id DESC LIMIT 4");
	  	$request1->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
	  	$request1->execute();
        $array1=$request1->fetchAll(PDO::FETCH_ASSOC);

        $request2=$this->db->prepare("SELECT i.id,i.url,i.titre,i.id_poster,i.date_post,i.type,u.photo,u.nom,u.prenom FROM image_post i JOIN friends f ON i.id_poster=f.id_friend AND f.id_user=:id JOIN users u ON f.id_friend=u.id_user ORDER BY i.id DESC LIMIT 3");
        $request2->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
        $request2->execute();
        $array2=$request2->fetchAll(PDO::FETCH_ASSOC);

        $request3=$this->db->prepare("SELECT i.id,i.url,i.titre,i.id_poster,i.date_post,i.type,u.photo,u.nom,u.prenom FROM video_post i JOIN friends f ON i.id_poster=f.id_friend AND f.id_user=:id JOIN users u ON f.id_friend=u.id_user ORDER BY i.id DESC LIMIT 3");
        $request3->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
        $request3->execute();
        $array3=$request3->fetchAll(PDO::FETCH_ASSOC);

        $arrayPosts=array_merge($array1,$array2,$array3);
        $this->sortTopPosts($arrayPosts);

       return $arrayPosts;
	  }catch(PDOException $e){
         die();
         return false;
	  }
}


public function getManyPosts($idUser,$className,$lastOfType){
		 try{
	  	$arrayPosts=[];
	  	$sql="SELECT * FROM $this->tableName AS tb WHERE id_poster=:id AND tb.id < $lastOfType ORDER BY id DESC LIMIT 20";
	  	$request=$this->db->prepare($sql);
	  	$request->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
	  	$request->execute();
	  	while($line=$request->fetch(PDO::FETCH_ASSOC)){
	  		if(class_exists($className))
	  			$post=new $className($line);
        	array_push($arrayPosts,$post);
        }
        return $arrayPosts;
	  }catch(PDOException $e){
         die();
         return false;
	  }
}


public function update($post,$type){


 if($type=="status"){

 	$request=$this->db->prepare("UPDATE status_post SET content =:content WHERE id=:id");
 	$request->bindValue(':content',$post->getContent(),PDO::PARAM_STR);
 	$request->bindValue(':id',(int)$post->getId(),PDO::PARAM_INT);

 }else if($type=="video"){
 	$request=$this->db->prepare("UPDATE video_post SET titre =:titre WHERE id=:id");
 	$request->bindValue(':titre',$post->getTitre(),PDO::PARAM_STR);
 	$request->bindValue(':id',(int)$post->getId(),PDO::PARAM_INT);

 }else if($type=="image"){
    $request=$this->db->prepare("UPDATE image_post SET titre =:titre WHERE id=:id");
 	$request->bindValue(':titre',$post->getTitre(),PDO::PARAM_STR);
 	$request->bindValue(':id',(int)$post->getId(),PDO::PARAM_INT);

 }else
 	return false;

 	try{
 	 $request->execute();
 	 return $request->rowCount();
 	}catch(PDOException $e){
 		return false;
 	}
}


public function delete($tableName,$idpost){

	    $sql="DELETE FROM $tableName WHERE id=:id";
		$request=$this->db->prepare($sql);
		$request->bindValue(':id',(int)$idpost,PDO::PARAM_INT);
	  
		try{
 	        $request->execute();
 	        return $request->rowCount();
 	    }catch(PDOException $e){
 		   return false;
 	     }
}

public function getNextPageProfile($idUser,$idlaststatus,$idlastimage,$idlastvideo){
 
 	  try{
	  	$request1=$this->db->prepare("SELECT * FROM status_post WHERE id_poster=:id AND id > :id_last_status  ORDER BY id DESC LIMIT 10");
	  	$request1->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
	  	$request1->bindValue(':id_last_status',(int)$idlaststatus,PDO::PARAM_INT);
	  	$request1->execute();
        $array1=$request1->fetchAll(PDO::FETCH_ASSOC);


        $request2=$this->db->prepare("SELECT * FROM image_post WHERE id_poster=:id AND id > :id_last_image  ORDER BY id DESC LIMIT 10");
        $request2->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
         $request2->bindValue(':id_last_image',(int)$idlastimage,PDO::PARAM_INT);
        $request2->execute();
        $array2=$request2->fetchAll(PDO::FETCH_ASSOC);


        $request3=$this->db->prepare("SELECT * FROM video_post WHERE id_poster=:id  AND id > :id_last_video ORDER BY id DESC LIMIT 10");
        $request3->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
        $request3->bindValue(':id_last_video',(int)$idlastvideo,PDO::PARAM_INT);
        $request3->execute();
        $array3=$request3->fetchAll(PDO::FETCH_ASSOC);

        $arrayPosts=array_merge($array1,$array2,$array3);
        $this->sortTopPosts($arrayPosts);

       return $arrayPosts;
	  }catch(PDOException $e){
         die();
         return false;
	  }
}


public function getNextPageAcceuil($idUser,$idlaststatus,$idlastimage,$idlastvideo){
     	  try{
	  	$request1=$this->db->prepare("SELECT i.id,i.content,i.id_poster,i.date_post,i.type,u.photo,u.nom,u.prenom FROM status_post i JOIN friends f ON i.id_poster=f.id_friend AND f.id_user=:id JOIN users u ON f.id_friend=u.id_user WHERE i.id < :id_last_status ORDER BY i.id DESC LIMIT 15");
	  	$request1->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
	  	$request1->bindValue(':id_last_status',(int)$idlaststatus,PDO::PARAM_INT);
	  	$request1->execute();
        $array1=$request1->fetchAll(PDO::FETCH_ASSOC);

        $request2=$this->db->prepare("SELECT i.id,i.url,i.titre,i.id_poster,i.date_post,i.type,u.photo,u.nom,u.prenom FROM image_post i JOIN friends f ON i.id_poster=f.id_friend AND f.id_user=:id JOIN users u ON f.id_friend=u.id_user WHERE i.id < :id_last_image ORDER BY i.id DESC LIMIT 15");
        $request2->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
        $request2->bindValue(':id_last_image',(int)$idlastimage,PDO::PARAM_INT);
        $request2->execute();
        $array2=$request2->fetchAll(PDO::FETCH_ASSOC);

        $request3=$this->db->prepare("SELECT i.id,i.url,i.titre,i.id_poster,i.date_post,i.type,u.photo,u.nom,u.prenom FROM video_post i JOIN friends f ON i.id_poster=f.id_friend AND f.id_user=:id JOIN users u ON f.id_friend=u.id_user WHERE i.id  < :id_last_video ORDER BY i.id DESC LIMIT 15");
        $request3->bindValue(':id',(int)$idUser,PDO::PARAM_INT);
        $request3->bindValue(':id_last_video',(int)$idlastvideo,PDO::PARAM_INT);
        $request3->execute();
        $array3=$request3->fetchAll(PDO::FETCH_ASSOC);

        $arrayPosts=array_merge($array1,$array2,$array3);
        $this->sortTopPosts($arrayPosts);

       return $arrayPosts;
	  }catch(PDOException $e){
         die();
         return false;
	  }
	  
}

}
?>