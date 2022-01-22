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
include("../database.php");
include("../comman-include.php");
$url = $_REQUEST['url'];
$tags = $_REQUEST['tags'];
$language = $_REQUEST['language'];

$sql = "INSERT INTO ytfvo (`url`,`tags`,`user`,`language`) VALUES ('$url','$tags','$username','$language')";
  
if ($conn->query($sql) === TRUE) {
} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>

</body>
</html>