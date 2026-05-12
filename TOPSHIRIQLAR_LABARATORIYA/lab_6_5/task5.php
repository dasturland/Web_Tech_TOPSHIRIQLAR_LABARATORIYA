<?php
require_once __DIR__ . '/common.php';
// API authentication via ?token=secret123
$token = $_GET['token'] ?? null;
if ($token !== 'secret123') {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['error'=>'Unauthorized']);
    exit;
}
// Send custom header
send_custom_header();
// Cache control
header('Cache-Control: max-age=300');

// Simple response: JSON list of products
$products = db_connect();
header('Content-Type: application/json; charset=utf-8');
echo json_encode(array_values($products));
?>