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

    $id    = $_POST['id'] ?? 0;
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if(empty($id) || empty($name) || empty($email)){

        echo json_encode([
            "status" => false,
            "message" => "All fields required"
        ]);
        exit;
    }

    $stmt = $pdo->prepare("
        UPDATE students
        SET name = :name,
            email = :email
        WHERE id = :id
    ");

    $stmt->execute([
        "id"    => $id,
        "name"  => $name,
        "email" => $email
    ]);

    echo json_encode([
        "status" => true,
        "message" => "Student Updated"
    ]);

} catch(Exception $e){

    echo json_encode([
        "status" => false,
        "message" => $e->getMessage()
    ]);
}