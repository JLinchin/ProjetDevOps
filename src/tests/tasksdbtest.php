<?php
use PHPUnit\Framework\TestCase;

print_r(scandir('../ProjetDevOps'));

require_once '../ProjetDevOps/src/db/connection.php';
require_once '../ProjetDevOps/src/db/tasks.db.php';

class TasksDbTest extends TestCase {
    private PDO $pdo;

    // Configuration de la connexion PDO pour une base de données de test
    $this->pdo = new PDO('mysql::memory');

    public function testTasks() {
        // Création de la table tasks pour les tests
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS tasks (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)
        ");

        $result = addTask($this->pdo, 'Test Task');
        $this->assertTrue($result);
            
            }
        }