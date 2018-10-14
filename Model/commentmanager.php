<?php

class CommentManager implements Savable{
	use traitSecureData;
	private $db;

	public function __construct($db){
		$this->db=$db;
	}

public function save($comment){

	   try{
		   $request=$this->db->prepare('INSERT INTO comment(date_post_comment,id_commenter,id_post_commented,type_post_commented,comment_content) VALUES (NOW(),:id_commenter,:id_post_commented,:type_post_commented,:comment_content)');
		      $request->bindValue(":id_commenter",$comment->getId_commenter(),PDO::PARAM_INT);
		      $request->bindValue(":id_post_commented",$comment->getId_post_commented(),PDO::PARAM_INT);
		      $request->bindValue(":type_post_commented",$comment->getType_post_commented(),PDO::PARAM_STR);
		      $request->bindValue(":comment_content",$comment->getComment_content(),PDO::PARAM_STR);
		      $res=$request->execute();
		      return $this->db->lastInsertId();
		  }catch(PDOException $e){
		  	  echo $e->getMessage();
		  	  return false;
		  }
}

public function update($commentId,$commentContent){

	try{
		$request=$this->db->prepare("UPDATE comment SET comment_content=:content WHERE id_comment=:id");
		$request->bindValue(":content",$this->secureData($commentContent),PDO::PARAM_STR);
		$request->bindValue(':id',(int)$commentId,PDO::PARAM_INT);
		$request->execute();
	}catch(PDOException $e){
		return false;
	}	
}


public function delete($commentId,$typeppost){
		try{
			$request=$this->db->prepare("DELETE FROM comment WHERE id_comment=:id");
			$request->bindValue(':id',(int)$commentId,PDO::PARAM_INT);
			$request->execute();
		}catch(PDOException $e){
			return false;
		}

}



public function getListUsersCommetingThisPost($idpostcommented,$typepostcommented){

  try{
	   $request=$this->db->prepare("SELECT u.nom,u.id_user,u.photo,c.comment_content,c.id_comment ,c.date_post_comment FROM users u JOIN comment c ON u.id_user=c.id_commenter AND c.id_post_commented=:id_post_commented AND c.type_post_commented=:type_post_commented ORDER BY c.date_post_comment DESC");
	   $request->bindValue(':id_post_commented',(int)$idpostcommented,PDO::PARAM_INT);
	   $request->bindValue(':type_post_commented',$typepostcommented,PDO::PARAM_STR);
	   $request->execute();
	   return (array)$request->fetchAll(PDO::FETCH_ASSOC);
	}catch(PCOException $e){
		die($e->getMessage());
		return false;
	}
}

public function countComments($iduser){

	try{
	    $request=$this->db->prepare("SELECT COUNT(id_comment) AS nbr_comments,id_post_commented,type_post_commented FROM comment c GROUP BY c.type_post_commented,c.id_post_commented HAVING id_post_commented IN (SELECT id FROM status_post WHERE id_poster=:id_user UNION SELECT id FROM image_post WHERE id_poster=:id_user UNION SELECT id FROM video_post WHERE id_poster=:id_user) LIMIT 30");
	    $request->bindValue(':id_user',(int)$iduser,PDO::PARAM_INT);
	    $request->execute();
	    return (array)$request->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		return false;
	}
}


public function countCommentsForAcceuil($iduser,$idfreinds){

	try{
	    $request=$this->db->prepare("SELECT COUNT(id_comment) AS nbr_comments,id_post_commented,type_post_commented FROM comment c GROUP BY c.type_post_commented,c.id_post_commented HAVING id_post_commented IN (SELECT id FROM status_post WHERE FIND_IN_SET(id_poster,:idfriends) UNION SELECT id FROM image_post WHERE FIND_IN_SET(id_poster,:idfriends) UNION SELECT id FROM video_post WHERE FIND_IN_SET(id_poster,:idfriends)) LIMIT 60");
	    $ar=(array)$idfreinds;
	    $request->bindValue(':id_user',(int)$iduser,PDO::PARAM_INT);
	     $request->bindValue(':idfriends',implode(',',$ar));
	    $request->execute();
	    return (array)$request->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		return false;
	}
}


}
?>