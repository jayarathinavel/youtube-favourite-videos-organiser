<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./resources/stylesheet.css">
  <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
  <title>Home</title>
</head>
<body>
  
  <?php
  include("./isloggedin.php");
  include("./database.php");
  include("./apikey.php");
  include("./get-username.php");
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
  echo '<div id="navbar">';
  echo '<a href="/index.php" id="home">Home</a>';
  
  echo '<select id="tags">';
  echo '<option> Select a tag </option>';

  echo '<option value="/index.php"> All </option>';
  for ($i = 0; $i < count($tagsSingle); $i++) {
    if ($tagsUnique[$i]) { //To filter the empty array values
      if($tagsUnique[$i] == $_GET['tagName']){ //For Default value in Select
        echo '<option value="/index.php?isTagSelected=true&tagName=' . $tagsUnique[$i] . '" selected>' . $tagsUnique[$i] . '</option>';
      }
      else{
        echo '<option value="/index.php?isTagSelected=true&tagName=' . $tagsUnique[$i] . '">' . $tagsUnique[$i] . '</option>';
      }
    }
  }

  echo '</select>
  <a href="/insert/form.html" style="float:right;" id ="insert" > Insert </a>
  <a href="/index.php?editMode=true" style="float:right;" id="edit"> Edit </a>
  </div>';
  
  //Main Container
  if(!$isLoggedIn){
    echo '<div class="not-logged-in"> You are not logged in, <a href="./login.php"> login </a> to see your own content </div>';
  }
  echo '<div class="thumbnail-container">';
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
    <div class="thumbnail-div"><img src = "'.$thumbnail_url.'" class="thumbnail" />
    <a href="'.$url.'" title="'.$title.'" ><p class="title">'.$title.'</a></p>
    <span class="tags">' .$tags.'</span>
    <span class="duration">'.$duration.'</span>';
    $edit = $_GET['editMode'];
    if ($edit){
    echo'
    <sapn class="modify-update"><a href="./update/update.php?update=true&updateId='.$id.'" style="color:green;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span>
    &nbsp;
    <sapn class="modify-delete"><a href="./delete.php?delete=true&deleteId='.$id.'" style="color:red;"><i class="fa fa-trash" aria-hidden="true"></i></a></span>&nbsp;';
    }
    echo '</div>';
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
  <script>
    //For dropdown
    document.getElementById("tags").onchange = function() {
      if (this.selectedIndex !== 0) {
        window.location.href = this.value;
      }
    };

    //For responsive nav bar
    if(screen.width <= 600){
      document.getElementById("edit").innerHTML = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
      document.getElementById("insert").innerHTML = '<i class="fa fa-plus-square-o" aria-hidden="true"></i>';
      document.getElementById("home").innerHTML = '<i class="fa fa-home" aria-hidden="true"></i>';
    }
</script>

</body>
</html>