<?php
trait childpost{
	
  public function setHeight($height){$this->height=$height;}
  public function setWidth($width){$this->width=$width;}
  public function setTitre($titre){$this->titre=$this->secureData($titre);}
  public function setUrl($url){$this->url=$url;}

  public function getHeigth(){return $this->height;}
  public function getWidth(){return $this->width;}
  public function getTitre(){return $this->titre;}
  public function getUrl(){return $this->url;}
  
}
?>