<?php
session_start();
$err = $_SESSION['err'] ?? [];
unset($_SESSION['err']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
</head>

<body>
  <form action="handle.php" method="post">
    <h3>Register</h3>
    <br />
    <?php if (!empty($err)): ?>
      
        <ul>
          <?php foreach ($err as $er): ?>
            <li><?php echo htmlspecialchars($er); ?></li>
          <?php endforeach; ?>
        </ul>
      
    <?php endif; ?>
    <label for="name">name</label><br />
    <input type="text" name="name" />
    <br />
    <label for="email">email</label><br />
    <input type="email" name="email" />
    <br />
    <label for="password">password</label><br />
    <input type="password" name="password" />
    <br />
    <label for="phone">phone</label><br />
    <input type="text" name="phone" />
    <br />
    <br />
    <input type="submit" value="Register" />
    <br />
  </form>
</body>

</html>