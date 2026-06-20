<?php

require_once 'db.php';

header('Content-Type: application/json');

try {

    $id = $_POST['id'] ?? 0;

    if(empty($id)){

        echo json_encode([
            "status" => false,
            "message" => "ID Required"
        ]);
        exit;
    }

    $stmt = $pdo->prepare("
        DELETE FROM students
        WHERE id = :id
    ");

    $stmt->execute([
        "id" => $id
    ]);

    echo json_encode([
        "status" => true,
        "message" => "Student Deleted"
    ]);

} catch(Exception $e){

    echo json_encode([
        "status" => false,
        "message" => $e->getMessage()
    ]);
}