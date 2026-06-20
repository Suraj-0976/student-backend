<?php

header('Content-Type: application/json');
require_once 'db.php';

try {

    $stmt = $pdo->query("
        SELECT *
        FROM students
        ORDER BY id DESC
    ");

    echo json_encode($stmt->fetchAll());

} catch(Exception $e){

    echo json_encode([
        "status" => false,
        "message" => $e->getMessage()
    ]);
}