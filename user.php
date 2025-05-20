<?php
include 'connect.php';

global $fgba;
$fgba = ["", "", ""];

$fgba[0] = $_POST['prn'] ?? '';
$fgba[1] = $_POST['username'] ?? '';
$fgba[2] = $_POST['password'] ?? '';

$dbga = [];
if (isset($_POST['add'])) {
    $sql = "INSERT INTO login (PRN, User_Name, Password) VALUES ('$fgba[0]', '$fgba[1]', '$fgba[2]')";
    $dbga[] = [$connection->query($sql) ? "Record added successfully" : "Error: " . $connection->error, "", ""];
} elseif (isset($_POST['update'])) {
    $sql = "UPDATE login SET User_Name='$fgba[1]', Password='$fgba[2]' WHERE PRN='$fgba[0]'";
    $dbga[] = [$connection->query($sql) ? "Record updated successfully" : "Error: " . $connection->error, "", ""];
} elseif (isset($_POST['delete'])) {
    $sql = "DELETE FROM login WHERE PRN='$fgba[0]'";
    $dbga[] = [$connection->query($sql) ? "Record deleted successfully" : "Error: " . $connection->error, "", ""];
} elseif (isset($_POST['search'])) {
    $sql = "SELECT * FROM login WHERE PRN='$fgba[0]'";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dbga[] = [$row["PRN"], $row["User_Name"], $row["Password"]];
        }
    } else {
        $dbga[] = ["No results found", "", ""];
    }
} elseif (isset($_POST['read'])) {
    $sql = "SELECT * FROM login";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dbga[] = [$row["PRN"], $row["User_Name"], $row["Password"]];
        }
    } else {
        $dbga[] = ["No records found", "", ""];
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD - Three-Tier Architecture</title>
</head>
<body>
    <form method="post" action="index.php">
        <button type="submit" name="dgba" value="$dbga">Back</button>
    </form>

    <?php
    if (!empty($dbga)) {
        foreach ($dbga as $row) {
            echo "PRN: " . $row[0] . " - Username: " . $row[1] . " - Password: " . $row[2] . "<br>";
        }
    }
    ?>
</body>
</html>