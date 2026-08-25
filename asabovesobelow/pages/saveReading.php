<?php 
session_start();
require_once __DIR__ . '/oracle.php';

header('Content-Type: application/json');

// readings tabel requires user id sooo make sure seeker logged in >:D
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => '🔮 Seeker must be logged in.']);
    exit;
}

if (isset($_POST['cardA']) && isset($_POST['cardB'])) {

    $userId = $_SESSION['user_id'];
    $cardA_id = $_POST['cardA'];
    $cardB_id = $_POST['cardB'];

    $cardA_rev = (isset($_POST['cardA_reversed']) && $_POST['cardA_reversed'] === 'true') ? 1 : 0;
    $cardB_rev = (isset($_POST['cardB_reversed']) && $_POST['cardB_reversed'] === 'true') ? 1 : 0;

    try {

        $stmt = $pdo->prepare("
            INSERT INTO readings (user_id, card_a_id, card_a_reversed, card_b_id, card_b_reversed)
            VALUES (:user_id, :card_a, :card_a_rev, :card_b, :card_b_rev)
        ");

        $stmt->execute([
            'user_id' => $userId,
            'card_a' => $cardA_id,
            'card_a_rev' => $cardA_rev,
            'card_b' => $cardB_id,
            'card_b_rev' => $cardB_rev
        ]);

        echo json_encode(['success' => true]);
        
    } catch (\PDOException $e) {
        error_log("🔮 Binding faild: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => '🔮 Database insertion failed']);
    }
    } else {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => '🔮 Missing ritual ingridients']);
    
}
?>