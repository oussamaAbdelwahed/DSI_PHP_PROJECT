<?php
class Image{

use traitSecureData;

const MAXHEIGHT=3000;
const MAXWIDTH=3000;

	public static function haveGoodSize(){

         $arraySizes=getimagesize($_FILES['file']['tmp_name']);
         return  ($arraySizes[0] <= self::MAXWIDTH) AND ($arraySizes[1] <= self::MAXHEIGHT);
	}


    public static function createMiniature($truename){
  
	    $extensions_valides =['jpg','jpeg','gif','png'];
	    $extension=strtolower(substr(strrchr($_FILES['file']['name'],'.'),1));

	  if(in_array($extension,$extensions_valides)){

	     $destination=imagecreatetruecolor(100,100);
	      $name="";
	    	 if($extension=="jpeg" OR $extension=="jpg"){
	    	 	  move_uploaded_file($_FILES['file']['tmp_name'],'../../miniatures/'.$truename.'.jpg');
	    	       $source=imagecreatefromjpeg('../../miniatures/'.$truename.'.jpg');
	    	      imagecopyresampled($destination,$source,0,0,0,0,100,100,imagesx($source),imagesy($source));
	    	      imagejpeg($destination,"../../miniatures/".$truename."min.jpg");
	    	      $name=$truename."min.jpg";
             }else if($extension=="png"){
             	     move_uploaded_file($_FILES['file']['tmp_name'],'../../miniatures/'.$truename.'.png');
	    		     $source=imagecreatefrompng('../../miniatures/'.$truename.'.png');
	    		     imagecopyresampled($destination,$source,0,0,0,0,100,100,imagesx($source),imagesy($source));
	    		     imagepng($destination,"../../miniatures/".$truename."min.png");
	    		     $name=$truename."min.png";
             }else{
             	   move_uploaded_file($_FILES['file']['tmp_name'],'../../miniatures/'.$truename.'.gif');
                    $source=imagecreatefromgif('../../miniatures/'.$truename.'.gif');
                   imagecopyresampled($destination,$source,0,0,0,0,100,100,imagesx($source),imagesy($source));
                   imagegif($destination,"../../miniatures/".$truename."min.gif");
                   $name=$truename."min.gif";
	            }
	            return $name;
	       } 
	      return false;    
	}



	public static function createSpecificImage($truename,$height,$width){

        $extensions_valides =['jpg','jpeg','gif','png'];
	    $extension=strtolower(substr(strrchr($_FILES['file']['name'],'.'),1));

	  if(in_array($extension,$extensions_valides)){

	     $destination=imagecreatetruecolor((int)$height,(int)$width);
	      $name="";
	    	 if($extension=="jpeg" OR $extension=="jpg"){
	    	 	  move_uploaded_file($_FILES['file']['tmp_name'],'../../miniatures/'.$truename.'.jpg');
	    	       $source=imagecreatefromjpeg('../../miniatures/'.$truename.'.jpg');
	    	      imagecopyresampled($destination,$source,0,0,0,0,(int)$height,(int)$width,imagesx($source),imagesy($source));
	    	      imagejpeg($destination,"../../miniatures/".$truename."300.jpg");
	    	      $name=$truename."min.jpg";
             }else if($extension=="png"){
             	     move_uploaded_file($_FILES['file']['tmp_name'],'../../miniatures/'.$truename.'.png');
	    		     $source=imagecreatefrompng('../../miniatures/'.$truename.'.png');
	    		     imagecopyresampled($destination,$source,0,0,0,0,(int)$height,(int)$width,imagesx($source),imagesy($source));
	    		     imagepng($destination,"../../miniatures/".$truename."300.png");
	    		     $name=$truename."min.png";
             }else{
             	   move_uploaded_file($_FILES['file']['tmp_name'],'../../miniatures/'.$truename.'.gif');
                    $source=imagecreatefromgif('../../miniatures/'.$truename.'.gif');
                   imagecopyresampled($destination,$source,0,0,0,0,(int)$height,(int)$width,imagesx($source),imagesy($source));
                   imagegif($destination,"../../miniatures/".$truename."300.gif");
                   $name=$truename."min.gif";
	            }
	            return $name;
	       } 
	      return false;    
	}


}
?>