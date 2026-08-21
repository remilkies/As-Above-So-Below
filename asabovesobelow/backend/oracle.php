<?php 
// ==========================================
// DATABASE CONNECTIONA NAD GATEKEEPER >:D
// ==========================================

// Sooo my application realies heavily on object-oriented prepared statements and PDO keeps the architechture completely unified, EXTRA secure against SQL injection and much cleaner to maintain sooo forgive me for not using mysqli but they both talk to the samne XAMPP MySQL server so I'm going with PDO cause ✨effecientcy✨


// $host = 'localhost';    //MySQL server adress (XXAMP runs it on my machine)
$host = '127.0.0.1'; //bypass mac socket issues (everyday i'm cursed for not using windows T-T)
$user = 'root';         //XAMPP default MySQL usersername
$pass = '';             //XAMPP default password (nada)
$db   = 'AsAboveSoBelow';
$charset = 'utf8mb4';

// $conn = mysqli_connect($host, $user, $pass, $db);

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE                   => PDO::ERRMODE_EXCEPTION,  //throw readable exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE        => PDO::FETCH_ASSOC,        //fetch associative arrays by default
    PDO::ATTR_EMULATE_PREPARES          => false,                   //native prepared stantment for high security >:D
];

try {

    error_log("🔮 Channeling Oracle...");

    //init PDO instance
    $pdo = new PDO($dsn, $user, $pass, $options);

    error_log( "🔮 Oracle has been channeled successfully >:D");

    // 7 DAY PURGE SILENT ASSASIN >:D
    // Dev note: XAMPP's event scheduler threw a tantrum, so we're doing this the stree smart way.  Database purges itself and banishes readings older than a week in the background everytime she is summoned, No scheduled events needed. WE ARE THE EVENT >:D
    $purgeStmt = $pdo->prepare("DELETE FROM readings WHERE created_at < DATE_SUB(NOW(), INTERVAL 7 DAY)");
    $purgeStmt->execute();

    if ($purgeStmt->rowCount() > 0) {
        error_log("🌙 The 7-day purge ritual has been executed " . $purgeStmt->rowCount() . " reading(s) banished to the void.");
    }
    
} catch (\PDOException $e) {
    error_log("🔮 The oracle is engulfed in shadow, channeling failed: " . $e->getMessage());

    //so js fetch() detencts error status and shows up in console instead of IM MY HTML WHERE I WON'T NOTICE IT
    http_response_code(500); 
    echo "The Oracle channel has collapsed. Error code: " . (int)$e->getCode();
    exit;
    
}
?>