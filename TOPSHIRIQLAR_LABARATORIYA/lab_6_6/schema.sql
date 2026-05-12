-- Schema and seed data for lab_6_6
PRAGMA foreign_keys = ON;
BEGIN TRANSACTION;

-- Drop existing tables if any (safe for recreating database)
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    email TEXT UNIQUE,
    password TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    category TEXT,
    price REAL,
    qty INTEGER,
    deleted_at DATETIME
);

CREATE TABLE posts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT,
    body TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE comments (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    post_id INTEGER,
    author TEXT,
    body TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(post_id) REFERENCES posts(id)
);

-- Seed data: password is hashed for 'password123'
INSERT INTO users (name,email,password) VALUES ('Sadullayev Jaxongi','student@example.com','$2y$10$Byjg2tUfOUmJa5/b4W.9E.HzWdJyJSGJCFbuTlKvNtTNQ5lKp0re.');

INSERT INTO products (name,category,price,qty) VALUES
('Apple','Fruits',1.2,10),
('Banana','Fruits',0.8,0),
('Chair','Furniture',25,5);

INSERT INTO posts (title,body) VALUES ('Welcome','This is a sample post');
INSERT INTO comments (post_id,author,body) VALUES (1,'Alice','Nice post'),(1,'Bob','Thanks');

COMMIT;
