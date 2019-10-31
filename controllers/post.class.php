<?php
class Post extends DB {
  function get(){
    return $this->select("SELECT * FROM `post`");
  }
}
?>