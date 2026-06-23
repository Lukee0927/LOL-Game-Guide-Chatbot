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
    echo json_encode(['reply' => 'Say something, Summoner! I\'m listening.']);
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
    // Trim verbose responses to keep them concise and engaging
    $response = $row['response'];
    $response = trimResponse($response);
    echo json_encode(['reply' => $response]);
} else {
    echo json_encode([
        'reply' => "Not in my knowledge base yet, Summoner! Try rephrasing, or check the Guides page for detailed breakdowns."
    ]);
}

/**
 * Makes long responses more concise:
 * - Caps at 3 sentences or ~280 characters, whichever comes first
 * - Removes excessive bullet formatting if present
 * - Appends "..." only when content was actually cut
 */
function trimResponse(string $text): string {
    $text = trim($text);

    // If short enough, return as-is
    if (mb_strlen($text) <= 280) {
        return $text;
    }

    // Split by sentences (period, exclamation, question mark followed by space or end)
    $sentences = preg_split('/(?<=[.!?])\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);

    if (count($sentences) <= 3) {
        // Already 3 sentences or fewer — just trim length if way too long
        if (mb_strlen($text) > 400) {
            return mb_substr($text, 0, 400) . '…';
        }
        return $text;
    }

    // Take first 3 sentences
    $trimmed = implode(' ', array_slice($sentences, 0, 3));

    // Safety cap at 350 chars
    if (mb_strlen($trimmed) > 350) {
        $trimmed = mb_substr($trimmed, 0, 350) . '…';
    }

    return $trimmed;
}
