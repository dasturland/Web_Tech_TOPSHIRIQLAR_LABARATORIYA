<?php
require_once __DIR__ . '/common.php';
// Session visit counter
if (!isset($_SESSION['visits'])) $_SESSION['visits'] = 0;
$_SESSION['visits']++;
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Session Counter</title></head>
<body>
<h2>Session visits</h2>
<p>You have visited this page <?php echo (int)$_SESSION['visits']; ?> times in this session.</p>
</body>
</html>