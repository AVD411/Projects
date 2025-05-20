<?php
$host = 'localhost';
$db = 'electricity_billing';
$user = 'root'; // Update with your MySQL username
$pass = ''; // Update with your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
