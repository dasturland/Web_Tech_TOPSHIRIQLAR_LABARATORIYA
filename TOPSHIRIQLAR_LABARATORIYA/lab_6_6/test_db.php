<?php
require_once __DIR__ . '/db.php';
try {
    $db = get_db();
    $stmt = $db->query('SELECT id,name,category,price,qty FROM products');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "Products: " . count($rows) . "\n";
    foreach ($rows as $r) {
        echo $r['id'] . ': ' . $r['name'] . ' (' . $r['category'] . ') qty=' . $r['qty'] . "\n";
    }
} catch (Exception $e) {
    echo 'ERR: ' . $e->getMessage() . "\n";
}
?>