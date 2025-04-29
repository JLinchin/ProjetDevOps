<?php
require_once 'db/tasks.db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for adding a task
    $title = $_POST['title'] ?? '';

    if (!empty($title)) {
        if (addTask($pdo, $title)) {
            header('Location: view_tasks.php');
            exit;
        } else {
            echo "Error: Could not add the task.";
        }
    }
}

include 'templates/header.php';
?>

<h1>Task Management Application</h1>

<form action="index.php" method="post">
    <label for="title">New Task:</label>
    <input type="text" id="title" name="title" required>
    <button type="submit">Add Task</button>
</form>

<a href="view_tasks.php">View Tasks</a>

<?php include 'templates/footer.php'; ?>