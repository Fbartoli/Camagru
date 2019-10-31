<?php
class Users extends DB {
	function getall(){
		return $this->select("SELECT * FROM `user`");
	}

	function get($pseudo){
		return $this->select('SELECT id, firstname, lastname, pseudo, reg_date FROM `user` WHERE pseudo ="'. $pseudo .'"');
	}

	function create_user($array){
		$query = "INSERT INTO `user`(firstname, lastname, pseudo, email, pass) VALUES ('".$array['firstname']."', '".$array['lastname']."', '".$array['pseudo']."', '".$array['email']."', '".$array['pass']."')";
		$pseudo = $array['pseudo'];
		if(!($this->get($pseudo)))
			return $this->create($query);
		else
			return NULL;
	}
}
?>