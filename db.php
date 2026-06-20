<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// OPTIONS request handle karo
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$host = $_ENV['MYSQLHOST'] ?? getenv('MYSQLHOST');
$port = $_ENV['MYSQLPORT'] ?? getenv('MYSQLPORT');
$dbname = $_ENV['MYSQLDATABASE'] ?? getenv('MYSQLDATABASE');
$username = $_ENV['MYSQLUSER'] ?? getenv('MYSQLUSER');
$password = $_ENV['MYSQLPASSWORD'] ?? getenv('MYSQLPASSWORD');

try {

    $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

    $pdo = new PDO(
        $dsn,
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );

} catch (PDOException $e) {

    http_response_code(500);

    echo json_encode([
        "status" => false,
        "message" => "Database connection failed"
    ]);

    exit();
}