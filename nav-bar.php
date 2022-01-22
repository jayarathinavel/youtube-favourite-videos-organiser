<?php

use JetBrains\PhpStorm\Language;

include("./database.php");
include("./comman-include.php");
include("./insert/insert-form.php");
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index.php">YTFVO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-1 mb-lg-0">
        <li class="nav-item m-1">
          <a class=" btn btn-sm btn-secondary nav-link" href="/index.php">Home</a>
        </li>
        <?php if (!$hideInsertEditTag) { ?>
          <?php if ($isLoggedIn) { ?>
            <li class="nav-item m-1">
              <a type="button" class="btn btn-sm btn-secondary nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Insert
              </a>
            </li>
          <?php
            $edit = $_GET['editMode'];
            if ($edit && !(isset($_GET['isTagSelected'])) && !(isset($_GET['isLanguageSelected']))) {
              echo '
                  <li class="nav-item m-1">
                    <a class="btn btn-sm btn-danger nav-link" href="/index.php">Exit Edit Mode</a>
                  </li>';
            } elseif (isset($_GET['isTagSelected']) && !$edit) {
              echo '
                  <li class="nav-item m-1">
                    <a class="btn btn-sm btn-secondary nav-link" href="/index.php?editMode=true&isTagSelected=true&tagName=' . $_GET['tagName'] . '">Edit Mode</a>
                  </li>';
            } elseif (isset($_GET['isLanguageSelected']) && !$edit) {
              echo '
                  <li class="nav-item m-1">
                    <a class="btn btn-sm btn-secondary nav-link" href="/index.php?editMode=true&isLanguageSelected=true&languageName=' . $_GET['languageName'] . '">Edit Mode</a>
                  </li>';
            } elseif (isset($_GET['isTagSelected']) && $edit) {
              echo '
                  <li class="nav-item m-1">
                    <a class="btn btn-sm btn-danger nav-link" href="/index.php?isTagSelected=true&tagName=' . $_GET['tagName'] . '">Exit Edit Mode</a>
                  </li>';
            } elseif (isset($_GET['isLanguageSelected']) && $edit) {
              echo '
                  <li class="nav-item m-1">
                    <a class="btn btn-sm btn-danger nav-link" href="/index.php?isLanguageSelected=true&languageName=' . $_GET['languageName'] . '">Exit Edit Mode</a>
                  </li>';
            } else {
              echo '
                  <li class="nav-item m-1">
                    <a class="btn btn-sm btn-secondary nav-link" href="/index.php?editMode=true">Edit Mode</a>
                  </li>';
            }
          }
          ?>

          <!-- Tags dropdown -->
          <li class="nav-item dropdown m-1">
            <a class="btn btn-sm btn-secondary nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Tags </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <?php
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

              for ($i = 0; $i < count($tagsSingle); $i++) {
                if ($tagsUnique[$i] && !$edit) { //To filter the empty array values
                  if ($tagsUnique[$i] == $_GET['tagName']) { //For Default value in Select
                    echo '<li><a class="dropdown-item active" href="/index.php?isTagSelected=true&tagName=' . $tagsUnique[$i] . '">' . $tagsUnique[$i] . '</a></li>';
                  } else {
                    echo '<li><a class="dropdown-item" href="/index.php?isTagSelected=true&tagName=' . $tagsUnique[$i] . '">' . $tagsUnique[$i] . '</a></li>';
                  }
                }
                if ($tagsUnique[$i] && $edit) { //To filter the empty array values
                  if ($tagsUnique[$i] == $_GET['tagName']) { //For Default value in Select
                    echo '<li><a class="dropdown-item active" href="/index.php?isTagSelected=true&tagName=' . $tagsUnique[$i] . '&editMode=true">' . $tagsUnique[$i] . '</a></li>';
                  } else {
                    echo '<li><a class="dropdown-item" href="/index.php?isTagSelected=true&tagName=' . $tagsUnique[$i] . '&editMode=true">' . $tagsUnique[$i] . '</a></li>';
                  }
                }
              }
              ?>
            </ul>
          </li>

          <!-- Language dropdown -->
          <li class="nav-item dropdown m-1">
            <a class="btn btn-sm btn-secondary nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Language </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <?php
              //To fetch language links
              $languageQuery = "SELECT language FROM ytfvo WHERE user = '$username'";
              $languageResult = $conn->query($languageQuery);
              $languageArray = array();
              $languageSingle = array();

              while ($languageRow = $languageResult->fetch_assoc()) {
                $languageArray[] = $languageRow['language'];
              }

              for ($i = 0; $i < count($languageArray); $i++) {
                $languageSingle[] = $languageArray[$i];
              }

              $languageUnique = array_unique($languageSingle);

              for ($i = 0; $i < count($languageSingle); $i++) {
                if ($languageUnique[$i] && !$edit) { //To filter the empty array values
                  if ($languageUnique[$i] == $_GET['languageName']) { //For Default value in Select
                    echo '<li><a class="dropdown-item active" href="/index.php?isLanguageSelected=true&languageName=' . $languageUnique[$i] . '">' . $languageUnique[$i] . '</a></li>';
                  } else {
                    echo '<li><a class="dropdown-item" href="/index.php?isLanguageSelected=true&languageName=' . $languageUnique[$i] . '">' . $languageUnique[$i] . '</a></li>';
                  }
                }
                if ($languageUnique[$i] && $edit) { //To filter the empty array values
                  if ($languageUnique[$i] == $_GET['languageName']) { //For Default value in Select
                    echo '<li><a class="dropdown-item active" href="/index.php?isLanguageSelected=true&languageName=' . $languageUnique[$i] . '&editMode=true">' . $languageUnique[$i] . '</a></li>';
                  } else {
                    echo '<li><a class="dropdown-item" href="/index.php?isLanguageSelected=true&languageName=' . $languageUnique[$i] . '&editMode=true">' . $languageUnique[$i] . '</a></li>';
                  }
                }
              }
              ?>
            </ul>
          </li>
          <!-- View all -->
          <?php
          if (isset($_GET['isTagSelected']) && !$edit) {
            echo '
                  <li class="nav-item m-1">
                    <a class="btn btn-sm btn-success nav-link" href="/index.php">View all</a>
                  </li>
                ';
          } elseif (isset($_GET['isTagSelected']) && $edit) {
            echo '
                  <li class="nav-item m-1">
                    <a class="btn btn-sm btn-success nav-link" href="/index.php?editMode=true">View all</a>
                  </li>
                ';
          } elseif (isset($_GET['isLanguageSelected']) && !$edit) {
            echo '
                  <li class="nav-item m-1">
                    <a class="btn btn-sm btn-success nav-link" href="/index.php">View all</a>
                  </li>
                ';
          } elseif (isset($_GET['isLanguageSelected']) && $edit) {
            echo '
                  <li class="nav-item m-1">
                    <a class="btn btn-sm btn-success nav-link" href="/index.php?editMode=true">View all</a>
                  </li>
                ';
          }
          ?>
        <?php } ?>
      </ul>

      <!-- Right dropdown/Login button -->
      <?php
      if ($isLoggedIn) {
        echo '
          <ul class="navbar-nav">
              <li class="nav-item dropdown m-1">
                  <a class="btn btn-sm btn-secondary nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> ' . $username . ' </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="./dashboard.php">Dashboard</a></li>
                    <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                  </ul>
              </li>
          </ul>';
      } else {
        echo '
          <ul class="navbar-nav">
            <li class="nav-item btn btn-sm btn-secondary m-1">
              <a href="./login.php" class="nav-link"> Login </a>
            </li>
          </ul>';
      }
      ?>
    </div>
  </div>
</nav>
<div style="padding-top:80px;"></div>