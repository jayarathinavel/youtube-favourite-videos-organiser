<?php
    //Theme
    $theme = "darkly";

    //Get Username
    if($isLoggedIn){
        $username = $_SESSION["username"];
    }
    else{
        $username = 'admin';
    }

    //Is Logged In ?
    session_start();
    $isLoggedIn = false;
    if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
    $isLoggedIn = true;
    }
?>