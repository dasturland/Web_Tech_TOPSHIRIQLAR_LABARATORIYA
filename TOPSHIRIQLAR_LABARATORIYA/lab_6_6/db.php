<?php
function get_db(){
    // Prefer database.db (requested), fall back to lab6.db (legacy)
    $dbFile1 = __DIR__ . '/database.db';
    $dbFile2 = __DIR__ . '/lab6.db';
    $dbFile = file_exists($dbFile1) ? $dbFile1 : $dbFile2;
    if (!file_exists($dbFile)) {
        throw new RuntimeException("Database file not found: {$dbFile}. Run lab_6_6/init_db.php to create it.");
    }
    $db = new PDO('sqlite:' . $dbFile);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
?>