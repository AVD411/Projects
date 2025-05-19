<?php
include 'db.php';
$data = json_decode(file_get_contents("php://input"), true);
$stmt = $conn->prepare("UPDATE students SET name=?, sdam_mse=?, sdam_ese=?, daa_mse=?, daa_ese=?, dbms_mse=?, dbms_ese=?, os_mse=?, os_ese=? WHERE id=?");
$stmt->bind_param("siiiiiiiii", $data["name"], $data["sdam"][0], $data["sdam"][1], $data["daa"][0], $data["daa"][1], $data["dbms"][0], $data["dbms"][1], $data["os"][0], $data["os"][1], $data["id"]);
$stmt->execute();
echo "Updated";
?>
