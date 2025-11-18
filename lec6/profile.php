<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: register.php");
    exit;
}

$user = $_SESSION['user'];
?>

<?php


// Logout hundler
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: register.php");
    exit;
}
?>

<!doctype html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
</head>

<body>

    <h2> Profile </h2>

    <p><span class="label">Name: </span> <?php echo htmlspecialchars($user['name']); ?></p>
    <p><span class="label">Email: </span> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><span class="label">Phone :</span> <?php echo htmlspecialchars($user['phone']); ?></p>

    <form method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>

</html>