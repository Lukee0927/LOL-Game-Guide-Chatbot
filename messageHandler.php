<?php
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

require_once __DIR__ . '/config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['reply' => 'Method not allowed.']);
    exit;
}

$raw     = isset($_POST['message']) ? trim($_POST['message']) : '';
$message = mb_strtolower(strip_tags($raw), 'UTF-8');

if ($message === '') {
    echo json_encode(['reply' => 'Please type a message first, Summoner!']);
    exit;
}

$pdo = getDBConnection();

$sql = "SELECT response
        FROM chatbot_knowledge
        WHERE LOWER(:msg) LIKE CONCAT('%', LOWER(keyword), '%')
        ORDER BY LENGTH(keyword) DESC
        LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute([':msg' => $message]);
$row = $stmt->fetch();

if ($row) {
    echo json_encode(['reply' => $row['response']]);
} else {
    echo json_encode([
        'reply' => "I don't have information about that topic yet, Summoner. Please ask an administrator to add it to my knowledge base — or try rephrasing your question!"
    ]);
}
