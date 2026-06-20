<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

$host = "localhost";
$dbname = "railway";
$username = "root";
$password = "IsLzggkvlMILATUboDzAAMPsIdndYsZY";
try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch(PDOException $e){

    echo json_encode([
        "status" => false,
        "message" => $e->getMessage()
    ]);

    exit;
}