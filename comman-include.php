<?php
    //Theme
    $theme = "darkly";

    //Is Logged In ?
    session_start();
    $isLoggedIn = false;
    if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
        $isLoggedIn = true;
    }

    //Get Username
    if($isLoggedIn){
        $username = $_SESSION["username"];
    }
    else{
        $username = 'admin';
    }

    //To Hide other buttons
    $requestUri = $_SERVER['REQUEST_URI'];
    if(preg_match('/\bdashboard\b/', $requestUri) || preg_match('/\blogin\b/', $requestUri) || preg_match('/\bregister\b/', $requestUri) || preg_match('/\breset-password\b/', $requestUri)){
        $hideInsertEditTag = true;
    }
    
?>