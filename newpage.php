<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php?loggedIn=no");
    exit;
}
?>
<?php echo "Hi"; ?>
