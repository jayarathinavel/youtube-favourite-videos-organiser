<?php
    include("./isloggedin.php");
    $username = $_SESSION["username"];

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
    echo '</select>';
    if($isLoggedIn){
        echo '
        <div onclick="myFunction()" class="dropdown" style="float:right;" >
        <div id="user">'.$username.'</div>
            <div id="myDropdown" class="dropdown-content">
            2<br>
                3
            </div>
        </div>
        ';
    }
    echo '        
    <a href="/insert/form.html" style="float:right;" id ="insert" > Insert </a>
    <a href="/index.php?editMode=true" style="float:right;" id="edit"> Edit </a>
    </div>';
?>