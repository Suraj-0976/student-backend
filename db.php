<?php

header("Content-Type: application/json");

$host = "thomas.proxy.rlwy.net";
$port = 18165;
$dbname = "railway";
$username = "root";
$password = "IsLzggkvlMILATUboDzAAMPsIdndYsZY";

try {

    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );

    echo json_encode([
        "status" => true,
        "message" => "DB CONNECTED"
    ]);

} catch (Exception $e) {

    echo json_encode([
        "status" => false,
        "message" => $e->getMessage()
    ]);
}