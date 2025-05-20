<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WT_LAB";

$connection = new mysqli($servername, $username, $password, $dbname);


if ($connection->connect_error) {
    echo "Connection failed :";
}
else
    echo "Connection sucessfully";

?>