<?php
class Post extends DB {
  function getall(){
    return $this->select("SELECT * FROM `post`");
  }
}
?>