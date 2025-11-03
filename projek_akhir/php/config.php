<?php
// File: config.php
$host = '192.168.109.195';
$username = 'smk';
$password = 'smk123';
$database = 'db_kantin';

function getDBConnection()
{
    global $host, $username, $password, $database;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        // JANGAN gunakan die(), return null saja
        error_log("Database connection failed: " . $e->getMessage());
        return null;
    }
}

function getTableName($type)
{
    $tables = [
        'stok' => 'stok_barang'
    ];
    return $tables[$type] ?? $type;
}
?>