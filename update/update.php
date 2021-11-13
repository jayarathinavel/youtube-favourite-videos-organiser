<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        .div-center {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        form {
            text-align: center;
        }
        
        input {
            border: 1px solid rgb(128, 133, 133);
        }
    </style>
</head>
<body>
  
<?php
include("../database.php");
$updatId = $_GET['updateId'];

if (isset($_GET['update'])){
  $valuesSql = "SELECT `url`,`tags`, `sequence` FROM ytfvo WHERE sequence = $updatId";
  $values =  $conn->query($valuesSql);
}

if ($values->num_rows>0) {
    $row = $values->fetch_assoc();
        echo'
        <div class="div-center">
        <form action="action.php" method="post">
            <label for="url">URL :</label><br/>
            <input type="text" name="url" id="url" value="'.$row['url'].'"><br/>
            <label for="tags"> Tags :</label><br/>
            <input type="text" name="tags" id="tags" value="'.$row['tags'].'"><br/>
            <input type="number" name="sequence" id="sequence" value="'.$row['sequence'].'" hidden><br/>
            <input type="submit" value="Edit">
        </form>
        </div>
        ';
  }

$conn->close();

?>

</body>
</html>