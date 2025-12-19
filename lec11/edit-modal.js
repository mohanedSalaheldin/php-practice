const editModal = new bootstrap.Modal(
    document.getElementById('editModal')
);

document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const taskId = btn.dataset.id;
        const taskText = btn.dataset.task;

        document.getElementById('editTaskId').value = taskId;
        document.getElementById('editTaskInput').value = taskText;

        editModal.show();
    });
});
