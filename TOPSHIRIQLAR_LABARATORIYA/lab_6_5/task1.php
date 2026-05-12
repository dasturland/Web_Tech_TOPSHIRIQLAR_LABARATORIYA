<?php
require_once __DIR__ . '/common.php';
// Simple login form with "remember me"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    // Replace with real auth; here accept any non-empty username
    if ($username !== '') {
        $_SESSION['user'] = $username;
        if ($remember) {
            setcookie('remember_user', $username, time() + 60*60*24*30, '/');
        } else {
            setcookie('remember_user', '', time() - 3600, '/');
        }
        header('Location: task1.php');
        exit;
    } else {
        $error = 'Enter username';
    }
}

$remembered = $_COOKIE['remember_user'] ?? '';
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Remember me</title></head>
<body>
<h2>Login (Remember me)</h2>
<?php if (!empty($_SESSION['user'])): ?>
    <p>Logged in as: <?php echo htmlspecialchars($_SESSION['user']); ?> - <a href="?logout=1">Logout</a></p>
<?php endif; ?>
<?php if (isset($_GET['logout'])) { session_destroy(); setcookie('remember_user','',time()-3600,'/'); header('Location: task1.php'); exit; } ?>
<form method="post">
    <label>Username: <input name="username" value="<?php echo htmlspecialchars($remembered); ?>"></label><br>
    <label>Password: <input type="password" name="password"></label><br>
    <label><input type="checkbox" name="remember"> Remember me</label><br>
    <button type="submit">Login</button>
</form>
<?php if (!empty($error)) echo '<p style="color:red">'.htmlspecialchars($error).'</p>'; ?>
</body>
</html>