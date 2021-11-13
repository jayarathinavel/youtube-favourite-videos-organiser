<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv = "refresh" content = "0; url =/index.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted</title>
</head>
<body>
<?php
  include("./database.php");
  $delId = $_GET['deleteId'];
  if (isset($_GET['delete'])){
   $deleteSql = "DELETE FROM ytfvo WHERE sequence = $delId";
   $deleteResult =  $conn->query($deleteSql);
  }

 ?>
</body>
</html>