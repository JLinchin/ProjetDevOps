<?php
require_once 'db/tasks.db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

<div class="container">
    <h1>Task Management Application</h1>

    <form action="index.php" method="post">
        <label for="title">New Task:</label>
        <input type="text" id="title" name="title" required>
        <input type="submit" value="Add Task">
    </form>

    <a href="view_tasks.php" class="button">View Tasks</a>
</div>

<?php include 'templates/footer.php'; ?>