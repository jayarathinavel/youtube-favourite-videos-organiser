<?php
  if($isLoggedIn){
    $username = $_SESSION["username"];
  }
  else{
    $username = 'admin';
  }
?>