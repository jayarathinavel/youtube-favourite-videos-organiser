<?php
    include("./comman-include.php");
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">YTFVO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-1 mb-lg-0">
          <li class="nav-item m-1">
            <a class=" btn btn-sm btn-secondary nav-link" href="/index.php">Home</a>
          </li> 
          <li class="nav-item m-1">
            <a class="btn btn-sm btn-secondary nav-link" href="/insert/form.html">Insert</a>
          </li>
          <?php 
            $edit = $_GET['editMode'];
            if ($edit){
              echo'
                <li class="nav-item m-1">
                  <a class="btn btn-sm btn-danger nav-link" href="/index.php">Exit Edit Mode</a>
                </li>';
            }
            else{
              echo'
                <li class="nav-item m-1">
                  <a class="btn btn-sm btn-secondary nav-link" href="/index.php?editMode=true">Edit Mode</a>
                </li>';
            }
            ?>
          <li class="nav-item dropdown m-1">
            <a class="btn btn-sm btn-secondary nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Tags </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <?php
                for ($i = 0; $i < count($tagsSingle); $i++) {
                    if ($tagsUnique[$i]) { //To filter the empty array values
                        if($tagsUnique[$i] == $_GET['tagName']){ //For Default value in Select
                        echo '<li><a class="dropdown-item" href="/index.php?isTagSelected=true&tagName=' . $tagsUnique[$i] . '">' . $tagsUnique[$i] . '</a></li>';
                        }
                        else{
                        echo '<li><a class="dropdown-item" href="/index.php?isTagSelected=true&tagName=' . $tagsUnique[$i] . '">' . $tagsUnique[$i] . '</a></li>';
                        }
                    }
                }
              ?>
            </ul>
          </li>
      </ul>
      <?php
        if($isLoggedIn){ echo '
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
                  <a class="btn btn-sm btn-secondary nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> '.$username.' </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="./dashboard.php">Dashboard</a></li>
                    <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                  </ul>
              </li>
          </ul>';
        }
        else{
          echo '
          <ul class="navbar-nav">
            <li class="nav-item btn btn-sm btn-secondary ms-2 me-2">
              <a href="./login.php" class="nav-link"> Login </a>
            </li>
          </ul>';   
      }
    ?>
    </div>
  </div>
</nav>
<div style="padding-top:75px;"></div>