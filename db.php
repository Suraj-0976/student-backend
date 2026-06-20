<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");


$host = "thomas.proxy.rlwy.net";
$port = "18165";
$dbname = "railway";
$username = "root";
$password = "IsLzggkvlMILATUboDzAAMPsIdndYsZY";

try {

    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

} catch(PDOException $e){

    echo json_encode([
        "status" => false,
        "message" => $e->getMessage()
    ]);

    exit;
}