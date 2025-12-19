<?php

require "../config/db.php";


$id = $_GET['id'];


$toggleQuery = "
    UPDATE tasks
    SET is_completed = NOT is_completed
    WHERE id = $id
";


mysqli_query($connection, $toggleQuery);


header("Location: ../index.php");
exit;
