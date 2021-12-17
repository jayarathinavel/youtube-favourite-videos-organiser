<?php include("./comman-include.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./resources/stylesheet.css">
  <link href="./resources/bootwatch-themes/<?php echo $theme; ?>/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="./resources/script.js"></script>
  <title>Home</title>
</head>
<body>
  <?php
  include("./comman-include.php");
  include("./database.php");
  include("./apikey.php");
  include("./comman-include.php");
  include("./youtube-api.php");

  //To fetch tags links
  $tagsQuery = "SELECT tags FROM ytfvo WHERE user = '$username'";
  $tagsResult = $conn->query($tagsQuery);
  $tagsArray = array();
  $tagsSingle = array();

  while ($tagsRow = $tagsResult->fetch_assoc()) {
    $tagsArray[] = $tagsRow['tags'];
  }

  for ($i = 0; $i < count($tagsArray); $i++) {
    $splitted = explode(",", $tagsArray[$i]);
    for ($j = 0; $j < count($splitted); $j++) {
      $tagsSingle[] = trim($splitted[$j]);
    }
  }

  $tagsUnique = array_unique($tagsSingle);

  //Main Queries
  if (isset($_GET['isTagSelected'])) {
    $tagname = $_GET['tagName'];
    $sql = "SELECT `url`,`tags`,`sequence` FROM ytfvo WHERE tags LIKE '%$tagname%' AND user = '$username' ORDER BY `sequence`";
  } else {
    $sql = "SELECT `url`,`tags`,`sequence` FROM ytfvo WHERE user = '$username' ORDER BY `sequence`";
  }

  //Main select Query execution
  $result = $conn->query($sql);

  //Navbar
  include("./nav-bar.php");
  
  //Main Container
  if(!$isLoggedIn){
    echo '<div class="not-logged-in"> You are not logged in, <a href="./login.php"> login </a> to see your own content </div>';
  }
  echo '<div class="thumbnail-container mt-3">';
  if ($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {

      $toSplit = explode('=', $row['url']);
      $videoID = $toSplit[1];

      $title = getTitle($videoID, $apikey);
      $url = $row['url'];
      $thumbnail_url = getThumbnail($videoID);
      $duration = getDuration($videoID, $apikey);
      $tags = $row['tags'];
      $id = $row['sequence'];

      echo '
    <div class="thumbnail-div">';
      $edit = $_GET['editMode'];
      if ($edit){
      echo'
      <div class="d-flex mb-1"><strong class="me-auto"></strong>
      <a href="./update/update.php?update=true&updateId='.$id.'"><span class="badge bg-warning"><i class="bi bi-pencil-fill"></i></span></a>&nbsp;
      <a href="./delete.php?delete=true&deleteId='.$id.'"><span class="badge bg-danger"><i class="bi bi-trash-fill "></i></span></a>&nbsp;
      </div>
      ';
      }
      echo '
      <img src = "'.$thumbnail_url.'" class="thumbnail" />
      <a href="'.$url.'" title="'.$title.'" ><p class="title">'.$title.'</a></p>
      <span class="tags">' .$tags.'</span>
      <span class="duration">'.$duration.'</span>
    </div>';
    }
  } 
  else {
    echo "No results maame ";
  }

  echo '</div>';

  $conn->close();
  ?>

  <div id= "footer">
  </div>
</body>
</html>