<?php
    include("./isloggedin.php");
    $username = $_SESSION["username"];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">YTFVO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item btn btn-sm btn-secondary ms-2 me-2">
            <a class="nav-link active " href="/index.php">Home</a>
          </li>
          <li class="nav-item btn btn-sm btn-secondary ms-2 me-2">
            <a class="nav-link" href="/insert/form.html">Insert</a>
          </li>
          <li class="nav-item btn btn-sm btn-secondary ms-2 me-2">
            <a class="nav-link" href="/index.php?editMode=true">Edit Mode</a>
          </li>
          <li class="nav-item btn btn-sm btn-secondary ms-2 me-2">
            <a class="nav-link" href="#">Tags</a>
          </li>
      </ul>
      <?php
        if($isLoggedIn){ echo '
          <ul class="navbar-nav">
              <li class="nav-item dropdown btn btn-secondary">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> '.$username.' </a>
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