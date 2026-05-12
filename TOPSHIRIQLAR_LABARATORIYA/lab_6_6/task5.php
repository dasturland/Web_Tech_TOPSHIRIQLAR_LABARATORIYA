<?php
require_once __DIR__ . '/db.php';
session_start();
$db = get_db();
// Soft delete action
if (isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    $stmt = $db->prepare('UPDATE products SET deleted_at = CURRENT_TIMESTAMP WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: task5.php'); exit;
}

// CSV export
if (isset($_GET['export']) && $_GET['export'] === 'csv'){
    $stmt = $db->query('SELECT id,name,category,price,qty FROM products WHERE deleted_at IS NULL');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="products.csv"');
    $out = fopen('php://output','w');
    fputcsv($out, array_keys($rows[0]??['id'=>'id','name'=>'name']));
    foreach ($rows as $r) fputcsv($out, $r);
    exit;
}

// Category filter
$category = $_GET['category'] ?? '';
if ($category) {
    $stmt = $db->prepare('SELECT * FROM products WHERE deleted_at IS NULL AND category LIKE ?');
    $stmt->execute(["%$category%"]);
} else {
    $stmt = $db->query('SELECT * FROM products WHERE deleted_at IS NULL');
}
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html><body>
<h2>Products</h2>
<p>Welcome <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Guest'); ?></p>
<form method="get">
    <label>Filter category: <input name="category" value="<?php echo htmlspecialchars($category); ?>"></label>
    <button>Filter</button>
</form>
<p><a href="?export=csv">CSV yuklab olish</a></p>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Name</th><th>Category</th><th>Price</th><th>Qty</th><th>Actions</th></tr>
<?php foreach ($products as $p): ?>
    <tr<?php echo $p['qty']==0? ' class="zero"' : ''; ?> style="<?php echo $p['qty']==0? 'background:#fdd' : ''; ?>">
        <td><?php echo $p['id']; ?></td>
        <td><?php echo htmlspecialchars($p['name']); ?></td>
        <td><?php echo htmlspecialchars($p['category']); ?></td>
        <td><?php echo $p['price']; ?></td>
        <td><?php echo $p['qty']; ?></td>
        <td><a href="?delete=<?php echo $p['id']; ?>">Soft delete</a></td>
    </tr>
<?php endforeach; ?>
</table>
</body></html>