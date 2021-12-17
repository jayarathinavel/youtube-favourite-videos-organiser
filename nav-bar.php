<?php
    include("./isloggedin.php");
    $username = $_SESSION["username"];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid ms-5 me-5">
    <a class="navbar-brand" href="/index.php">YTFVO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item btn btn-sm btn-secondary me-2">
          <a class="nav-link active" href="/index.php">Home
          </a>
        </li>
        <li class="nav-item btn btn-sm btn-secondary me-2">
          <a class="nav-link" href="/insert/form.html">Insert</a>
        </li>
        <li class="nav-item btn btn-sm btn-secondary me-2">
          <a class="nav-link" href="/index.php?editMode=true">Edit Mode</a>
        </li>
        <li class="nav-item dropdown btn btn-sm btn-secondary me-2">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tags</a>
          <div class="dropdown-menu">
                <?php
                    for ($i = 0; $i < count($tagsSingle); $i++) {
                        if ($tagsUnique[$i]) { //To filter the empty array values
                            if($tagsUnique[$i] == $_GET['tagName']){ //For Default value in Select
                            echo '<a class="dropdown-item" href="/index.php?isTagSelected=true&tagName=' . $tagsUnique[$i] . '">' . $tagsUnique[$i] . '</a>';
                            }
                            else{
                            echo '<a class="dropdown-item" href="/index.php?isTagSelected=true&tagName=' . $tagsUnique[$i] . '">' . $tagsUnique[$i] . '</a>';
                            }
                        }
                    }
                ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">More</a>
          </div>
        </li>
      </ul>
      <div class="d-flex">
          <?php
            if($isLoggedIn){
                echo '
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./dashboard.php">Dashboard</a></li>
                    <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                  </ul>
                  <button type="button" class="btn btn-secondary">'.$username.'</button>
                </div>';
            }
            else{
                echo '<a href="./login.php" class="btn btn-secondary"> Login </a>';
                  
            }
          ?>
      </div>
    </div>
  </div>
</nav>