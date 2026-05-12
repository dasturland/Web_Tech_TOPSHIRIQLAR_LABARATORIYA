<?php
require_once __DIR__ . '/db.php';
session_start();
$db = get_db();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'] ?? '';
    $pass = $_POST['password'] ?? '';
    $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($pass, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('Location: task5.php'); exit;
    } else {
        $error = 'Invalid credentials';
    }
}
?>
<!doctype html>
<html><body>
<h2>Login</h2>
<form method="post">
    <input name="email" placeholder="email"><br>
    <input name="password" type="password" placeholder="password"><br>
    <button>Login</button>
</form>
<?php if (!empty($error)) echo '<p style="color:red">'.htmlspecialchars($error).'</p>'; ?>
</body></html>