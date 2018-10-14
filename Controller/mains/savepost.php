<?php
include "../../model/databaseconnection.php";
include "../inc/traitforchildspost.php";
include "../classes/traitsecuredata.php";
include "../classes/savableinterface.php";
include "../classes/post.php";
include "../classes/statuspost.php";
include "../classes/videopost.php";
include "../classes/imagePost.php";
include "../../model/postmanager.php";
include "../classes/filepost.php";

if(isset($_POST) AND !empty($_POST)){

  $url="";
  $jsonTab=[];

	if(isset($_FILES['file']) AND !empty($_FILES['file']['tmp_name'])){

		$extension=FilePost::getExtension();
		$uniqIdentifier=FilePost::generateUniqId();
    $table=$url="";

		if(FilePost::isImage($extension)){
         $jsonTab["type"]="image";
		 $url=FilePost::movePost($uniqIdentifier,$extension);
		 
         $post=new ImagePost(["url"=>$url,"id_poster"=>$_POST['id_poster'],"date_post"=>date('Y-m-d H:i:s'),"titre"=>$_POST['titre']]);
         $table="image_post";

		}else if(FilePost::isVideo($extension)){
          $jsonTab["type"]="video";
		  $url=FilePost::movePost($uniqIdentifier,$extension);
		 
		  $post=new VideoPost(["url"=>$url,"id_poster"=>$_POST['id_poster'],"date_post"=>date('Y-m-d H:i:s'),"titre"=>$_POST['titre']]);
          $table="video_post";
		}
		try{
		   $postManager=new PostManager($db,$table);
		   $res=$postManager->save($post);
           $jsonTab['url']=$url;
           $jsonTab['id']=$db->lastInsertId();
		   echo json_encode($jsonTab);

     	}catch(Exception $e){
     		die();
     	}
}else{

	if(!empty($_POST['content'])){
      $statuspost=new StatusPost($_POST);
      $postmanager=new PostManager($db);
       $res=$postmanager->saveStatus($statuspost);
       $jsonTab["type"]="status";
       $jsonTab['id']=$db->lastInsertId();
      echo json_encode($jsonTab);
    }

 }

}
?>