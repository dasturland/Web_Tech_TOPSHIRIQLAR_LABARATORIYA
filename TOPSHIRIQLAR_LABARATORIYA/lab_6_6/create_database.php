<?php
// Create database.db from schema.sql using SQLite3 extension (avoids PDO)
$schemaFile = __DIR__ . '/schema.sql';
$dbFile = __DIR__ . '/database.db';
if (!file_exists($schemaFile)) {
    echo "schema.sql not found: $schemaFile\n";
    exit(1);
}
$schema = file_get_contents($schemaFile);
if ($schema === false) {
    echo "Failed to read schema.sql\n";
    exit(1);
}
// Remove existing DB to recreate clean
@unlink($dbFile);

try {
    $db = new SQLite3($dbFile);
} catch (Exception $e) {
    echo "Failed to create SQLite3 DB: " . $e->getMessage() . "\n";
    exit(1);
}
// Execute schema; SQLite3::exec can handle multiple statements
if (!$db->exec($schema)) {
    echo "Failed to execute schema: " . $db->lastErrorMsg() . "\n";
    exit(1);
}
$db->close();

if (file_exists($dbFile)) {
    echo "database.db created at $dbFile\n";
    exit(0);
} else {
    echo "database.db not found after creation\n";
    exit(1);
}
?>