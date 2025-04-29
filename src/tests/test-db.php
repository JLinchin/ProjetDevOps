<?php
use PHPUnit\Framework\TestCase;

echo scandir('..');

require_once '../db/connection.php';
require_once '../db/tasks.db.php';

class TasksDbTest extends TestCase {
    private PDO $pdo;

    protected function setUp(): void {
        // Configuration de la connexion PDO pour une base de données de test
        $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=test_db', 'root', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Création de la table tasks pour les tests
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS tasks (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    }

    protected function tearDown(): void {
        // Suppression de la table tasks après chaque test
        $this->pdo->exec("DROP TABLE IF EXISTS tasks");
    }

    public function testAddTask(): void {
        $result = addTask($this->pdo, 'Test Task');
        $this->assertTrue($result);

        $stmt = $this->pdo->query("SELECT * FROM tasks WHERE title = 'Test Task'");
        $task = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertNotEmpty($task);
        $this->assertEquals('Test Task', $task['title']);
    }

    public function testGetTasks(): void {
        addTask($this->pdo, 'Task 1');
        addTask($this->pdo, 'Task 2');

        $tasks = getTasks($this->pdo);
        $this->assertCount(2, $tasks);
        $this->assertEquals('Task 1', $tasks[0]['title']);
        $this->assertEquals('Task 2', $tasks[1]['title']);
    }

    public function testDeleteTask(): void {
        addTask($this->pdo, 'Task to Delete');
        $result = deleteTask($this->pdo);
        $this->assertTrue($result);

        $tasks = getTasks($this->pdo);
        $this->assertEmpty($tasks);
    }

    public function testGetTaskCount(): void {
        addTask($this->pdo, 'Task 1');
        addTask($this->pdo, 'Task 2');

        $count = getTaskCount($this->pdo);
        $this->assertEquals(2, $count);
    }
}