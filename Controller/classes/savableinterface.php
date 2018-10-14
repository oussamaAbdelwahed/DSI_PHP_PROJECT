<?php

interface Savable{

	public function save($obj);
	public function update($idPostToUpdate,$typePost);
	public function delete($idPostToDelete,$typeppost);

}

?>