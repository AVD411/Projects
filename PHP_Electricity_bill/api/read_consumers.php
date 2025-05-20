<?php
header('Content-Type: application/json');
include '../config.php';
$consumers = $pdo->query("SELECT * FROM consumers")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($consumers);
?>
