<?php

header("Content-Type: application/json");

$host = "thomas.proxy.rlwy.net";
$port = 18165;
$dbname = "railway";
$username = "root";
$password = "IsLzggkvlMILATUboDzAAMPsIdndYsZY";

try {

    $pdo = new PDO(
    "mysql:host=thomas.proxy.rlwy.net;port=18165;dbname=railway;charset=utf8mb4",
    "root",
    "IsLzggkvlMILATUboDzAAMPsIdndYsZY",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);

    $pdo->query("SELECT 1");

    echo json_encode([
        "status" => true,
        "message" => "DB connected"
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "status" => false,
        "message" => $e->getMessage()
    ]);
}