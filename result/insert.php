<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);
$stmt = $conn->prepare("INSERT INTO students (name, sdam_mse, sdam_ese, daa_mse, daa_ese, dbms_mse, dbms_ese, os_mse, os_ese) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("siiiiiiii", 
    $data["name"], 
    $data["sdam"][0], $data["sdam"][1], 
    $data["daa"][0], $data["daa"][1], 
    $data["dbms"][0], $data["dbms"][1], 
    $data["os"][0], $data["os"][1]
);
$stmt->execute();
echo "Inserted";
?>
