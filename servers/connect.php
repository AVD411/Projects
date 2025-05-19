<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WT_LAB";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    echo "Connection failed :";
}
else
    echo "Connection sucessfully";

?>