<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once 'db.php';


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