<?php
header('Content-Type: application/json');
include '../config.php';
$id = $_GET['id'];
try {
    $stmt = $pdo->prepare("DELETE FROM consumers WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
