<?php
class LikeManager{

private $db;

public function __construct($db){
 $this->db=$db;
}

public function addLike($like){

	$request=null;

	if($like->getType_post_liked()=="status"){
		$request=$this->db->prepare('INSERT INTO status_likes(id_liker,id_status_liked) VALUES(?,?)');
	}else if($like->getType_post_liked()=="image"){
		$request=$this->db->prepare('INSERT INTO image_likes(id_liker,id_image_liked) VALUES(?,?)');
	}else if($like->getType_post_liked()=="video"){
		$request=$this->db->prepare('INSERT INTO video_likes(id_liker,id_video_liked) VALUES(?,?)');
	}else
	    return false;
	  try{
	  	$request->execute([(int)$like->getId_liker(),(int)$like->getId_post_liked()]);
	  	return $this->db->lastInsertId();
	  }catch(PDOException $e){
	  	echo $e->getMessage();
	  	return false;
	  }
}



public function removeLike($like){

	$request=null;

	if($like->getType_post_liked()=="status"){
		$request=$this->db->prepare('DELETE FROM status_likes WHERE id_liker=? AND id_status_liked=?');
	}else if($like->getType_post_liked()=="image"){
		$request=$this->db->prepare('DELETE FROM image_likes WHERE id_liker=? AND id_image_liked=?');
	}else if($like->getType_post_liked()=="video"){
		$request=$this->db->prepare('DELETE FROM video_likes WHERE id_liker=? AND id_video_liked=?');
	}else
	    return false;
	  try{
	  	$request->execute([(int)$like->getId_liker(),(int)$like->getId_post_liked()]);
	  	return $this->db->lastInsertId();
	  }catch(PDOException $e){
	  	echo $e->getMessage();
	  	return false;
	  }
}



public function countLikesForProfile($idposter){

		$req1=$this->db->prepare("SELECT id_status_liked AS id_post,id_liker,COUNT(s.id) AS nbr_likes,type FROM status_post s RIGHT JOIN status_likes ON id_status_liked=s.id AND id_poster=:id_poster GROUP BY id_status_liked");

		$req2=$this->db->prepare("SELECT id_image_liked AS id_post,id_liker,COUNT(s.id) AS nbr_likes,type FROM image_post s RIGHT JOIN image_likes ON id_image_liked=s.id AND id_poster=:id_poster GROUP BY id_image_liked");

		$req3=$this->db->prepare("SELECT id_video_liked AS id_post,id_liker,COUNT(s.id) AS nbr_likes,type FROM video_post s RIGHT JOIN video_likes ON id_video_liked=s.id AND id_poster=:id_poster GROUP BY id_video_liked");
		
		$req1->bindValue(":id_poster",(int)$idposter,PDO::PARAM_INT);
		$req2->bindValue(":id_poster",(int)$idposter,PDO::PARAM_INT);
		$req3->bindValue(":id_poster",(int)$idposter,PDO::PARAM_INT);
		try{
			$req1->execute();
			$req2->execute();
			$req3->execute();

		    $ar1=$req1->fetchAll(PDO::FETCH_ASSOC);
		    $ar2=$req2->fetchAll(PDO::FETCH_ASSOC);
		    $ar3=$req3->fetchAll(PDO::FETCH_ASSOC);

		     return (array)array_merge($ar1,$ar2,$ar3);
        }catch(PDOException $e){
    	    return false; 
        }
}

public function countLikesForAcceuil($tabidfriends){
	try{
		// SELECT id_image_liked AS id_post,id_liker,COUNT(s.id) AS nbr_likes,type FROM image_post s  JOIN image_likes ON id_image_liked=s.id AND id_poster IN(27,25) GROUP BY id_image_liked
		$liste=implode(",",(array)$tabidfriends);
       $request1=$this->db->prepare("SELECT id_image_liked AS id_post,id_liker,COUNT(s.id) AS nbr_likes,type FROM image_post s JOIN image_likes ON id_image_liked=s.id AND FIND_IN_SET(id_poster,:interval) GROUP BY id_image_liked");
       $request2=$this->db->prepare("SELECT id_status_liked AS id_post,id_liker,COUNT(s.id) AS nbr_likes,type FROM status_post s JOIN status_likes ON id_status_liked=s.id AND FIND_IN_SET(id_poster,:interval) GROUP BY id_status_liked");

       $request3=$this->db->prepare("SELECT id_video_liked AS id_post,id_liker,COUNT(s.id) AS nbr_likes,type FROM video_post s JOIN video_likes ON id_video_liked=s.id AND FIND_IN_SET(id_poster,:interval) GROUP BY id_video_liked");
       $request1->bindValue(":interval",$liste);
       $request2->bindValue(":interval",$liste);
       $request3->bindValue(":interval",$liste);

       	$request1->execute();
	    $request2->execute();
	    $request3->execute();

		$ar1=$request1->fetchAll(PDO::FETCH_ASSOC);
		$ar2=$request2->fetchAll(PDO::FETCH_ASSOC);
		$ar3=$request3->fetchAll(PDO::FETCH_ASSOC);
		     return (array)array_merge($ar1,$ar2,$ar3);
	}catch(PSOException $e){
		return false;
	}
}


public function countLikesForFriend($idfriend){
	
	try{
        $request=$this->db->prepare("SELECT COUNT(sl.id) AS nbr_likes,st.type,st.id AS id_post FROM status_likes sl JOIN status_post st ON sl.id_status_liked=st.id AND st.id_poster=:id GROUP BY st.id UNION SELECT COUNT(il.id),ip.type,ip.id AS id_post FROM image_likes il JOIN image_post ip ON il.id_image_liked=ip.id AND ip.id_poster=:id GROUP BY ip.id UNION SELECT COUNT(vl.id),vp.type,vp.id AS id_post FROM video_likes vl JOIN video_post vp ON vl.id_video_liked=vp.id AND vp.id_poster=:id GROUP BY vp.id");
        $request->bindValue(':id',(int)$idfriend,PDO::PARAM_INT);
        $request->execute();
        return (array)$request->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		return false;
	}
}


public function getListeLikers($idpost,$typepost){
	$request=null;

	try{
		if($typepost=="status"){
			$request=$this->db->prepare("SELECT u.nom,u.prenom,u.photo,u.id_user FROM users u JOIN status_likes s ON s.id_liker=u.id_user AND id_status_liked=:id_post");
		}else if($typepost=="image"){
			$request=$this->db->prepare("SELECT u.nom,u.prenom,u.photo FROM users u JOIN image_likes s ON s.id_liker=u.id_user AND id_image_liked=:id_post");
		}else{
			$request=$this->db->prepare("SELECT u.nom,u.prenom,u.photo FROM users u JOIN video_likes s ON s.id_liker=u.id_user AND id_video_liked=:id_post");
		}
		$request->bindValue(":id_post",(int)$idpost,PDO::PARAM_INT);
		$request->execute();
		return (array)$request->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		return false;
	}
}

public function WhatPostsLikeInProfile($iduser){

	try{
		$request=$this->db->prepare("SELECT sp.type,sp.id FROM status_post sp JOIN status_likes sl ON  sp.id=sl.id_status_liked  WHERE sl.id_liker=:id AND sp.id_poster=:id UNION SELECT sp.type,sp.id FROM image_post sp JOIN image_likes sl ON  sp.id=sl.id_image_liked WHERE sl.id_liker=:id AND sp.id_poster=:id UNION SELECT sp.type,sp.id FROM video_post sp JOIN video_likes sl ON  sp.id=sl.id_video_liked WHERE sl.id_liker=:id AND sp.id_poster=:id");
		$request->bindValue(":id",(int)$iduser,PDO::PARAM_INT);
		$request->execute();
		return (array)$request->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
        return false;
	}
}

public function WhatPostsLikeInAcceuil($iduser,$idfriends){

	try{
		$request=$this->db->prepare("SELECT sp.type,sp.id FROM status_post sp JOIN status_likes sl ON  sp.id=sl.id_status_liked  WHERE sl.id_liker=:id AND FIND_IN_SET(sp.id_poster,:idfreinds) UNION SELECT sp.type,sp.id FROM image_post sp JOIN image_likes sl ON  sp.id=sl.id_image_liked WHERE sl.id_liker=:id AND FIND_IN_SET(sp.id_poster,:idfreinds) UNION SELECT sp.type,sp.id FROM video_post sp JOIN video_likes sl ON  sp.id=sl.id_video_liked WHERE sl.id_liker=:id AND FIND_IN_SET(sp.id_poster,:idfreinds)");

		$request->bindValue(":id",(int)$iduser,PDO::PARAM_INT);
	    $request->bindValue(":idfreinds",$idfriends);
		$request->execute();
		return (array)$request->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
        return false;
	}
}


public function WhatPostsLikeInFriendProfile($idconnected,$idfriend){

	try{
		$request=$this->db->prepare("SELECT sp.type,sp.id FROM status_post sp JOIN status_likes sl ON  sp.id=sl.id_status_liked  WHERE sl.id_liker=:id AND sp.id_poster=:id_friend  UNION SELECT sp.type,sp.id FROM image_post sp JOIN image_likes sl ON  sp.id=sl.id_image_liked WHERE sl.id_liker=:id AND sp.id_poster=:id_friend  UNION SELECT sp.type,sp.id FROM video_post sp JOIN video_likes sl ON  sp.id=sl.id_video_liked WHERE sl.id_liker=:id AND sp.id_poster=:id_friend ");

		$request->bindValue(":id",(int)$idconnected,PDO::PARAM_INT);
		$request->bindValue(":id_friend",(int)$idfriend,PDO::PARAM_INT);
		$request->execute();
		return (array)$request->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
        return false;
	}
}


}
?>
