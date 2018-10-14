<?php
include "../classes/savableinterface.php";
include '../../model/databaseconnection.php';
include '../../model/postmanager.php';
include "../classes/traitsecuredata.php";
include "../inc/traitforchildspost.php";
include "../classes/post.php";
include "../classes/imagepost.php";

$ImagePost=new ImagePost(['id'=>1,"height"=>400,"width"=>400,"titre"=>"video de moi","url"=>"http://localhost/videos/vid1.mp4",'id_poster'=>10,'date_post'=>"2017-06-04"]);
echo $ImagePost;


?>