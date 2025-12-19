<?php

require "../config/db.php";


$id = $_GET['id'];


$deleteQuery = "DELETE FROM tasks WHERE id = $id";


mysqli_query($connection, $deleteQuery);


header("Location: ../index.php");
exit;
