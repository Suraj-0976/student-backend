<?php

require_once 'db.php';

header('Content-Type: application/json');

$stmt = $pdo->query("
    SELECT *
    FROM students
    ORDER BY id DESC
");

echo json_encode(
    $stmt->fetchAll(PDO::FETCH_ASSOC)
);