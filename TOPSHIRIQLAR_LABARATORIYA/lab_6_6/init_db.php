<?php
// Initialize (or recreate) SQLite DB for lab_6_6
$dbFile = __DIR__ . '/lab6.db';
$dbFile2 = __DIR__ . '/database.db';

// remove existing files to recreate clean DB
@unlink($dbFile);
@unlink($dbFile2);

$db = new PDO('sqlite:' . $dbFile);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// users table
$db->exec("CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    email TEXT UNIQUE,
    password TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// products table (soft delete)
$db->exec("CREATE TABLE products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    category TEXT,
    price REAL,
    qty INTEGER,
    deleted_at DATETIME
)");

// posts and comments
$db->exec("CREATE TABLE posts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT,
    body TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");
$db->exec("CREATE TABLE comments (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    post_id INTEGER,
    author TEXT,
    body TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(post_id) REFERENCES posts(id)
)");

// seed data
$db->exec("INSERT INTO users (name,email,password) VALUES ('Sadullayev Jaxongi','student@example.com', '".password_hash('password123', PASSWORD_DEFAULT)."')");
$db->exec("INSERT INTO products (name,category,price,qty) VALUES
('Apple','Fruits',1.2,10),
('Banana','Fruits',0.8,0),
('Chair','Furniture',25,5)");
$db->exec("INSERT INTO posts (title,body) VALUES ('Welcome','This is a sample post')");
$db->exec("INSERT INTO comments (post_id,author,body) VALUES (1,'Alice','Nice post'),(1,'Bob','Thanks')");

// copy to database.db as well
copy($dbFile, $dbFile2);

echo "DB created at $dbFile and $dbFile2\n";
?>