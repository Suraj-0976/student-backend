<?php

header('Content-Type: application/json');
require_once 'db.php';

try {

    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if(empty($name) || empty($email)) {
        echo json_encode([
            "status" => false,
            "message" => "All fields required"
        ]);
        exit;
    }

    $stmt = $pdo->prepare("
        INSERT INTO students(name,email)
        VALUES(:name,:email)
    ");

    $stmt->execute([
        "name" => $name,
        "email" => $email
    ]);

    echo json_encode([
        "status" => true,
        "message" => "Student Added"
    ]);

} catch(Exception $e){

    echo json_encode([
        "status" => false,
        "message" => $e->getMessage()
    ]);
}