<?php
session_start();

// Protect the page
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body text-center">

                    <h3 class="mb-3">Welcome, <?= htmlspecialchars($user['name']); ?></h3>
                    <p class="text-muted mb-4">Email: <?= htmlspecialchars($user['email']); ?></p>

                    <form action="../logout.php" method="post">
                        <button type="submit" name="logout" value="1" class="btn btn-danger w-50">
                            Logout
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



<?php include 'inc/footer.php'; ?>