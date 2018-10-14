<?php


class RemplissageOptions {

private $arrayMois=['Janvier','Février','Mars',"Avril","Mai",'Juin',"Juillet",'Aout',"Septembre","Octobre","Novembre","Décembre"];


public function remplirJours(){
 for($i=1;$i<32;$i++) {
 	if($i<10)
 	echo "<option value=\"0".$i."\">".$i."</option>";
   else
   	 echo "<option value=\"".$i."\">".$i."</option>";
 }
} 


public function remplirMois(){

  foreach ($this->arrayMois as $key => $value) {
	 if(($key+1) <10)
 	   echo "<option value=\"0".($key+1)."\">".$value."</option>";
     else
 	   echo "<option value=\"".($key+1)."\">".$value."</option>";
   }
} 

public function remplirAnnee(){
	
	$thisYear=date('Y');
	$beginCouting=(int)$thisYear - 120;
	for($i=$beginCouting;$i<($thisYear - 4);$i++){
		 	echo "<option value=\"".$i."\">".$i."</option>";
	}
}

}
?>