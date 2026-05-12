<?php
require_once __DIR__ . '/db.php';
try {
    $db = get_db();
    $tables = $db->query("SELECT name FROM sqlite_master WHERE type='table'")->fetchAll(PDO::FETCH_COLUMN);
    $dropped = [];
    foreach ($tables as $t) {
        // keep sqlite internal tables if any
        if ($t === 'sqlite_sequence') continue;
        $db->exec("DROP TABLE IF EXISTS \"$t\"");
        $dropped[] = $t;
    }
    echo "Dropped tables: " . implode(', ', $dropped) . "\n";
} catch (Exception $e) {
    echo 'ERR: ' . $e->getMessage() . "\n";
    exit(1);
}
?>