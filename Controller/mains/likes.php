<?php
include_once "../../model/databaseconnection.php";
include "../classes/like.php";
include "../../model/likemanager.php";
include_once '../classes/traitsecuredata.php';
include_once '../classes/savableinterface.php';
include "../classes/user.php";
session_start();
if(isset($_POST) AND !empty($_POST)){

  $url=$_SERVER['HTTP_REFERER'];
  $motif=strrchr($url,"/");
  $callerPage=explode("/",$motif)[1];
	
  $likesManager=new LikeManager($db);
  if(!empty($_POST['id_liker']) AND (!isset($_POST['action']) OR $_POST['action']!="delete")){
				$like=new Like($_POST);
				$res=$likesManager->addLike($like);
				echo (bool)$res;
  }else if(!empty($_POST['action']) AND $_POST['action']=="delete"){
				 $like=new Like($_POST);
                 $res=$likesManager->removeLike($like);
                 echo (bool)$res;
  }else if(isset($_POST['idpost']) AND isset($_POST['typepost']) AND isset($_POST['idpost']) AND !empty($_POST['idpost'])){

    if($callerPage=="friend.php" OR $callerPage=="acceuil.php" AND isset($_SESSION['user'])){

      $l=null;
      if($_POST['typepost']=="image"){
         $l=new Like(array("id_liker"=>$_SESSION['user']->getId_user(),"id_image_liked"=>$_POST['idpost']));
      }else if($_POST['typepost']=="video"){
         $l=new Like(array("id_liker"=>$_SESSION['user']->getId_user(),"id_video_liked"=>$_POST['idpost']));
      }else{
        $l=new Like(array("id_liker"=>$_SESSION['user']->getId_user(),"id_status_liked"=>$_POST['idpost']));
      }
      if(isset($_POST['action']) AND $_POST['action']=="removelike"){
         $likesManager->removeLike($l);
      }else{
        $likesManager->addLike($l);
      }
  }else{
    // if(!empty($_POST['action']) AND $_POST['action']=="delete"){
    //   $like=new Like($_POST);
    //              $res=$likesManager->removeLike($like);
    //              echo (bool)$res;
    // }
	   	echo json_encode($likesManager->getListeLikers($_POST['idpost'],$_POST['typepost']));
     }
  }

}
?>