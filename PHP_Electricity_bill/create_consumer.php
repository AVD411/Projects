<?php
header('Content-Type: application/json');
include '../config.php';
$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'];
$address = $data['address'];
$phone = $data['phone'];
try {
    $stmt = $pdo->prepare("INSERT INTO consumers (name, address, phone) VALUES (?, ?, ?)");
    $stmt->execute([$name, $address, $phone]);
    echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
