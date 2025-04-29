<?php
require_once 'db/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];

    if (!empty($task)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO tasks (title) VALUES (:task)");
            $stmt->bindParam(':task', $task, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "Task added successfully.";
            } else {
                echo "Error: Could not add the task.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
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
</head>
<body>
    <h1>Add a New Task</h1>
    <form method="POST" action="">
        <input type="text" name="task" placeholder="Enter your task" required>
        <button type="submit">Add Task</button>
    </form>
    <a href="view_tasks.php">View Tasks</a>
</body>
</html>