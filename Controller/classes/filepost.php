<?php
class FilePost{

public static function getExtension(){
	return strtolower(substr(strrchr($_FILES['file']['name'],'.'),1));
}

 public static function generateUniqId(){
 	return md5(uniqid());
 }

 public static function isImage($ext){
    $arrayImages=["jpg",'jpeg','png','gif']; 
    return (bool)in_array(strtolower($ext),$arrayImages);
 }

 public static function isVideo($ext){
    return (bool)(strtolower($ext)=="mp4");
 }


 public static function movePost($fileName,$extension){
     
     $file=$fileName.".".$extension;
     $destination=imagecreatetruecolor(500,500);
     $dest='';

 	if(self::isImage($extension)){
 		$dest="http://localhost/projetDSI/uploadedimages/".$file;
 		if(strtolower($extension)=='jpg' OR strtolower($extension)=='jpeg'){
            move_uploaded_file($_FILES['file']['tmp_name'],"../../uploadedimages/".$file);
           	$source=imagecreatefromjpeg('../../uploadedimages/'.$file);
	    	imagecopyresampled($destination,$source,0,0,0,0,500,500,imagesx($source),imagesy($source));
	    	imagejpeg($destination,"../../uploadedimages/".$file);
       }else if(strtolower($extension)=='png'){
       	    move_uploaded_file($_FILES['file']['tmp_name'],"../../uploadedimages/".$file);
           	$source=imagecreatefrompng('../../uploadedimages/'.$file);
	    	imagecopyresampled($destination,$source,0,0,0,0,500,500,imagesx($source),imagesy($source));
	    	imagepng($destination,"../../uploadedimages/".$file);
       }else{
       	    move_uploaded_file($_FILES['file']['tmp_name'],"../../uploadedimages/".$file);
           	$source=imagecreatefromgif('../../uploadedimages/'.$file);
	    	imagecopyresampled($destination,$source,0,0,0,0,500,500,imagesx($source),imagesy($source));
	    	imagegif($destination,"../../uploadedimages/".$file);
       }
 	}else{
    	move_uploaded_file($_FILES['file']['tmp_name'],"../../uploadedvideos/".$file);
    	$dest="http://localhost/projetDSI/uploadedvideos/".$file;
 	}
    return $dest;
 }

}
?>