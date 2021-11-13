<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv = "refresh" content = "0; url =../index.php"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edited</title>
</head>
<body>
  
<?php
include("../database.php");
$url = $_REQUEST['url'];
$tags = $_REQUEST['tags'];
$id = $_REQUEST['sequence'];
$sql = "UPDATE ytfvo SET url ='$url', tags = '$tags' WHERE sequence = '$id' ";
  
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>

</body>
</html>