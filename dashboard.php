<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php?loggedIn=no");
    exit;
}
?>
<?php 
    include("./comman-include.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./resources/bootwatch-themes/<?php echo $theme; ?>/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <?php  
        include("./nav-bar.php");
        $username = '';
    ?>
    <h4 class="my-4 text-center">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h4>
        <a href="reset-password.php" class="btn btn-warning m-3">Reset Your Password</a>
        <br/>
        <a href="logout.php" class="btn btn-danger m-3">Sign Out of Your Account</a>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="./resources/script.js"></script>
</body>
</html>