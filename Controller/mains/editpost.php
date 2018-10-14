<?php
include "../../model/databaseconnection.php";
include "../inc/traitforchildspost.php";
include "../classes/traitsecuredata.php";
include "../classes/savableinterface.php";
include "../classes/post.php";
include "../classes/statuspost.php";
include "../classes/videopost.php";
include "../classes/imagepost.php";
include "../../model/postmanager.php";
include '../classes/user.php';


if(isset($_POST) AND !empty($_POST) AND isset($_POST['typepost'])){
   $res="true";
   $postManager=new PostManager($db); 

   if($_POST['typepost']=="image"){
        $sp=new ImagePost(['id'=>$_POST['idpost'],'titre'=>$_POST['titre']]);
        $res=$postManager->update($sp,'image');
         echo "{\"content\":\"".htmlspecialchars_decode($_POST['content'])."\"}";
   }else if($_POST['typepost']=="video"){
          $sp=new VideoPost(['id'=>$_POST['idpost'],'titre'=>$_POST['titre']]);
          $res=$postManager->update($sp,'video');
           echo "{\"content\":\"".htmlspecialchars_decode($_POST['titre'])."\"}";
   }else if($_POST['typepost']=="status"){
          $sp=new StatusPost(['id'=>$_POST['idpost'],'content'=>$_POST['content']]);
          $res=$postManager->update($sp,'status');
          echo "{\"content\":\"".htmlspecialchars_decode($_POST['content'])."\"}";
   }else
    echo "error";
   
}
?>