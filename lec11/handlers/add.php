<?php

require "../config/db.php";


$title = $_POST['title'];


if ($title != "") {

    
    $insertQuery = "INSERT INTO tasks (title) VALUES ('$title')";

    
    mysqli_query($connection, $insertQuery);
}


header("Location: ../index.php");
exit;
