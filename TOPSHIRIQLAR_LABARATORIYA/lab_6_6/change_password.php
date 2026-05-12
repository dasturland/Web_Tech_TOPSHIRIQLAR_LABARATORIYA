<?php
require_once __DIR__ . '/db.php';
session_start();
$db = get_db();
if (!isset($_SESSION['user_id'])) { echo 'Login first'; exit; }
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $new = $_POST['new_password'] ?? '';
    if ($new) {
        $hash = password_hash($new, PASSWORD_DEFAULT);
        $stmt = $db->prepare('UPDATE users SET password = ? WHERE id = ?');
        $stmt->execute([$hash, $_SESSION['user_id']]);
        echo 'Password updated'; exit;
    }
}
?>
<!doctype html>
<html><body>
<h2>Change password for <?php echo htmlspecialchars($_SESSION['user_name']); ?></h2>
<form method="post">
    <input name="new_password" type="password" placeholder="New password"><br>
    <button>Change</button>
</form>
</body></html>