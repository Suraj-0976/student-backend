<?php

header("Content-Type: application/json");

$host = "thomas.proxy.rlwy.net";
$port = 18165;
$dbname = "railway";
$username = "root";
$password = "IsLzggkvlMILATUboDzAAMPsIdndYsZY";

try {

    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

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