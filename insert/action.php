<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv = "refresh" content = "0; url =/index.php#footer"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserted</title>
</head>
<body>
  
<?php
include("../login-required.php");
include("../database.php");
include("../isloggedin.php");
include("../get-username.php");
$url = $_REQUEST['url'];
$tags = $_REQUEST['tags'];
$sql = "INSERT INTO ytfvo (`url`,`tags`,`user`) VALUES ('$url','$tags','$username')";
  
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>

</body>
</html>