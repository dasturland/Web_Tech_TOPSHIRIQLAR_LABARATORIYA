<?php
require_once __DIR__ . '/db.php';
session_start();
$db = get_db();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $pass = $_POST['password'] ?? '';
    if ($email && $pass) {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $db->prepare('INSERT INTO users (name,email,password) VALUES (?,?,?)');
        $stmt->execute([$name,$email,$hash]);
        echo 'Registered. <a href="login.php">Login</a>';
        exit;
    }
}
?>
<!doctype html>
<html><body>
<h2>Register</h2>
<form method="post">
    <input name="name" placeholder="Full name" value="Sadullayev Jaxongi"><br>
    <input name="email" placeholder="email"><br>
    <input name="password" type="password" placeholder="password"><br>
    <button>Register</button>
</form>
</body></html>