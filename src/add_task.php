<?php
require_once 'db/tasks.db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];

    if (!empty($task)) {
        if (addTask($pdo, $task)) {
            echo "Task added successfully.";
        } else {
            echo "Error: Could not add the task.";
        }
    } else {
        echo "Task cannot be empty.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Add a New Task</h1>
        <form method="POST" action="">
            <input type="text" name="task" placeholder="Enter your task" required>
            <input type="submit" value="Add Task">
        </form>
        <a href="view_tasks.php" class="button">View Tasks</a>
    </div>
</body>
</html>