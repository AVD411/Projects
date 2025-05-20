<?php
header('Content-Type: application/json');
include '../config.php';
$billing = $pdo->query("SELECT b.*, c.name FROM billing b JOIN consumers c ON b.consumer_id = c.id")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($billing);
?>
