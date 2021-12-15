<?php
session_start();
$isLoggedIn = false;
if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
  $isLoggedIn = true;
}
?>