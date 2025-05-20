<?php
header('Content-Type: application/json');
include '../config.php';
include '../calculate_bill.php';
$data = json_decode(file_get_contents('php://input'), true);
$consumer_id = $data['consumer_id'];
$units = $data['units'];
$billing_date = $data['billing_date'];
$bill_amount = calculateBill($units);
try {
    $stmt = $pdo->prepare("INSERT INTO billing (consumer_id, units, bill_amount, billing_date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$consumer_id, $units, $bill_amount, $billing_date]);
    echo json_encode(['success' => true, 'bill_amount' => $bill_amount]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
