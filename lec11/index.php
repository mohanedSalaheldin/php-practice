<?php

require "config/db.php";

$selectQuery = "SELECT * FROM tasks ORDER BY id DESC";

$result = mysqli_query($connection, $selectQuery);

$tasks = [];

while ($row = mysqli_fetch_assoc($result)) {
    $tasks[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo App</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        table td {
            vertical-align: middle;
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">

    <!-- Add Task -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="POST" action="handlers/add.php" class="d-flex gap-2">
                <input
                    type="text"
                    name="title"
                    class="form-control form-control-lg"
                    placeholder="Enter your task"
                    required
                >
                <button class="btn btn-primary btn-lg px-4">
                    Add
                </button>
            </form>
        </div>
    </div>

    <!-- Tasks Table -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th>Task</th>
                        <th style="width: 180px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php if (count($tasks) === 0): ?>
                    <tr>
                        <td colspan="3" class="text-center py-4 text-muted">
                            No tasks yet
                        </td>
                    </tr>
                <?php endif; ?>

                <?php foreach ($tasks as $index => $task): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>

                        <td class="<?= $task['is_completed'] ? 'text-decoration-line-through text-muted' : '' ?>">
                            <?= htmlspecialchars($task['title']) ?>
                        </td>

                        <td class="text-center">

                            <!-- Toggle completed -->
                            <a href="handlers/toggle.php?id=<?= $task['id'] ?>"
                               class="btn btn-sm btn-success me-1"
                               title="Toggle Complete">
                                <i class="bi bi-check-lg"></i>
                            </a>

                            <!-- Edit -->
                            <button
                                class="btn btn-sm btn-warning me-1 edit-btn"
                                data-id="<?= $task['id'] ?>"
                                data-title="<?= htmlspecialchars($task['title']) ?>"
                                title="Edit">
                                <i class="bi bi-pencil"></i>
                            </button>

                            <!-- Delete -->
                            <a href="handlers/delete.php?id=<?= $task['id'] ?>"
                               class="btn btn-sm btn-danger"
                               title="Delete"
                               onclick="return confirm('Delete this task?')">
                                <i class="bi bi-trash"></i>
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="handlers/update.php" class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id" id="editTaskId">

                <input
                    type="text"
                    name="title"
                    id="editTaskInput"
                    class="form-control"
                    required
                >
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Save Changes
                </button>
            </div>

        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const editModal = new bootstrap.Modal(
        document.getElementById('editModal')
    );

    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('editTaskId').value = btn.dataset.id;
            document.getElementById('editTaskInput').value = btn.dataset.title;
            editModal.show();
        });
    });
</script>

</body>
</html>
