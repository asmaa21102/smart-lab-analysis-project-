<?php
require_once 'db.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        "success" => false,
        "message" => "User not logged in"
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        "success" => false,
        "message" => "Invalid request"
    ]);
    exit;
}

$user_id = $_SESSION['user_id'];
$file_name = isset($_POST['file_name']) ? trim($_POST['file_name']) : '';
$result_status = isset($_POST['result_status']) ? trim($_POST['result_status']) : 'normal';

if ($file_name === '') {
    echo json_encode([
        "success" => false,
        "message" => "Missing file name"
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO analyses (user_id, file_name, result_status, uploaded_at)
        VALUES (?, ?, ?, NOW())
    ");

    $stmt->execute([$user_id, $file_name, $result_status]);

    echo json_encode([
        "success" => true,
        "message" => "Analysis saved successfully"
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}
?>