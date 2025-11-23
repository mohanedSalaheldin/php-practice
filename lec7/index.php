<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: profile.php"); 
    exit();
} else {
    header("Location: login.php"); 
    exit();
}
?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>


<h1>Hello, Index!</h1>


<?php include 'inc/footer.php'; ?>