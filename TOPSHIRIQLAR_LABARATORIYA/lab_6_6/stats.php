<?php
require_once __DIR__ . '/db.php';
$db = get_db();
$stmt = $db->query('SELECT category, COUNT(*) as cnt, SUM(price) as total_price FROM products WHERE deleted_at IS NULL GROUP BY category');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html><body>
<h2>Statistics by category</h2>
<table border="1"><tr><th>Category</th><th>Count</th><th>Total Price</th></tr>
<?php foreach ($rows as $r): ?>
<tr><td><?php echo htmlspecialchars($r['category']); ?></td><td><?php echo $r['cnt']; ?></td><td><?php echo $r['total_price']; ?></td></tr>
<?php endforeach; ?>
</table>
</body></html>