<?php
header('Content-Type: application/json');
include '../config.php';
include '../calculate_bill.php';
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$consumer_id = $data['consumer_id'];
$units = $data['units'];
$billing_date = $data['billing_date'];
$bill_amount = calculateBill($units);
try {
    $stmt = $pdo->prepare("UPDATE billing SET consumer_id = ?, units = ?, bill_amount = ?, billing_date = ? WHERE id = ?");
    $stmt->execute([$consumer_id, $units, $bill_amount, $billing_date, $id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
