<?php

require "../config/db.php";


$id = $_POST['id'];
$title = $_POST['title'];


if ($title != "") {


    $updateQuery = "UPDATE tasks SET title = '$title' WHERE id = $id";


    mysqli_query($connection, $updateQuery);
}


header("Location: ../index.php");
exit;
