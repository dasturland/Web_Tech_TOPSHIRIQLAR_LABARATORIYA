<?php
require_once __DIR__ . '/common.php';
$products = db_connect();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

// Add to cart
if (isset($_GET['add'])) {
    $id = (int)$_GET['add'];
    if (!in_array($id, $_SESSION['cart'])) $_SESSION['cart'][] = $id;
    header('Location: task3.php'); exit;
}
// Remove from cart
if (isset($_GET['remove'])) {
    $id = (int)$_GET['remove'];
    $_SESSION['cart'] = array_filter($_SESSION['cart'], fn($x)=>$x!==$id);
    header('Location: task3.php'); exit;
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Simple Cart</title></head>
<body>
<h2>Products</h2>
<ul>
<?php foreach ($products as $p): ?>
    <li><?php echo htmlspecialchars($p['name']) ?> - $<?php echo $p['price'] ?>
        <a href="?add=<?php echo $p['id'] ?>">Add</a>
    </li>
<?php endforeach; ?>
</ul>
<h3>Your cart</h3>
<ul>
<?php foreach ($_SESSION['cart'] as $id):
    $prod = array_values(array_filter($products, fn($x)=>$x['id']==$id))[0] ?? null;
    if ($prod): ?>
        <li><?php echo htmlspecialchars($prod['name']) ?> <a href="?remove=<?php echo $id ?>">Remove</a></li>
    <?php endif; endforeach; ?>
</ul>
</body>
</html>