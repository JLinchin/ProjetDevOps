use task_db

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    test varchar,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);