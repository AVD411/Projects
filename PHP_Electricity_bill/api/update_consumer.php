<?php
header('Content-Type: application/json');
include '../config.php';
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$name = $data['name'];
$address = $data['address'];
$phone = $data['phone'];
try {
    $stmt = $pdo->prepare("UPDATE consumers SET name = ?, address = ?, phone = ? WHERE id = ?");
    $stmt->execute([$name, $address, $phone, $id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
