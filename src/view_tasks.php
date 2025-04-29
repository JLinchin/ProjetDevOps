<?php
require_once 'db/connection.php';

function fetchTasks($conn) {
    $sql = "SELECT * FROM tasks";
    $stmt = $conn->query($sql); // Prépare et exécute la requête
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Utilise PDO pour récupérer les résultats
}

$tasks = fetchTasks($pdo); // Passe l'objet $pdo (et non $conn)
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Tâches</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <h1>Liste des Tâches</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tâche</th>
                <th>Date de Création</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?php echo htmlspecialchars($task['id']); ?></td>
                    <td><?php echo htmlspecialchars($task['title']); ?></td>
                    <td><?php echo htmlspecialchars($task['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php include 'templates/footer.php'; ?>
</body>
</html>