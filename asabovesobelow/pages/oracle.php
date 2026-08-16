<?php 
// ==========================================
// DATABASE CONNECTIONA NAD GATEKEEPER >:D
// ==========================================

$host = 'localhost';
$db   = 'AsAboveSoBelow';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE                   => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE        => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // 7 DAY PURGE SILENT ASSASIN >:D
    // Dev note: XAMPP's event scheduler threw a tantrum, so we're doing this the stree smart way.  Database purges itself and banishes readings older than a week in the background everytime she is summoned, No scheduled events needed. WE ARE THE EVENT >:D
    $purgeStmt = $pdo->prepare("DELETE FROM readings WHERE created_at < DATE_SUB(NOW(), INTERVAL 7 DAY)");
    $purgeStmt->execute();
    
    error_log("🌙 The 7-day purge ritual has been executed");

} catch (\PDOException $e) {

    error_log("🔮 The oracle is engulfed in shadow, purge failed: " . $e->getMessage());
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
    
}
?>