<?php
require_once 'connection.php';

/**
 * Ajoute une tâche dans la base de données.
 *
 * @param PDO $pdo L'objet PDO pour la connexion à la base de données.
 * @param string $title Le titre de la tâche.
 * @return bool Retourne true si l'insertion a réussi, sinon false.
 */
function addTask(PDO $pdo, string $title): bool {
    try {
        $stmt = $pdo->prepare("INSERT INTO tasks (title) VALUES (:title)");
        return $stmt->execute(['title' => $title]);
    } catch (PDOException $e) {
        error_log("Erreur lors de l'ajout de la tâche : " . $e->getMessage());
        return false;
    }
}

/**
 * Récupère toutes les tâches de la base de données.
 *
 * @param PDO $pdo L'objet PDO pour la connexion à la base de données.
 * @return array Retourne un tableau associatif contenant les tâches.
 */
function getTasks(PDO $pdo): array {
    try {
        $stmt = $pdo->query("SELECT * FROM tasks");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Erreur lors de la récupération des tâches : " . $e->getMessage());
        return [];
    }
}

/**
 * Supprime toutes les tâches de la base de données.
 *
 * @param PDO $pdo L'objet PDO pour la connexion à la base de données.
 * @return bool Retourne true si la suppression a réussi, sinon false.
 */
function deleteTask(PDO $pdo): bool {
    try {
        $stmt = $pdo->prepare("DELETE FROM tasks");
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erreur lors de la suppression des tâches : " . $e->getMessage());
        return false;
    }
}

/**
 * Récupère le nombre de lignes dans la table tasks.
 *
 * @param PDO $pdo L'objet PDO pour la connexion à la base de données.
 * @return int Retourne le nombre de lignes dans la table tasks.
 */
function getTaskCount(PDO $pdo): int {
    try {
        $stmt = $pdo->query("SELECT COUNT(*) AS count FROM tasks");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $result['count'];
    } catch (PDOException $e) {
        error_log("Erreur lors de la récupération du nombre de tâches : " . $e->getMessage());
        return 0;
    }
}
?>