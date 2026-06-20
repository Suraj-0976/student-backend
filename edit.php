<?php

require_once 'db.php';

header('Content-Type: application/json');

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