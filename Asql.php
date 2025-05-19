
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WT_LAB";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    echo "Connection failed :";
}

$sql = "SELECT * FROM time_table";  // Your SQL query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Days/Slot</th>
                <th>11-12</th>
                <th>12-1</th>
                <th>1-2</th>
                <th>2-3</th>
                <th>3-4</th>
                <th>4-5</th>
                <th>5-6</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["Days/Slot"]."</td>
                <td>".$row["11-12"]."</td>
                <td>".$row["12-1"]."</td>
                <td>".$row["1-2"]."</td>
                <td>".$row["2-3"]."</td>
                <td>".$row["3-4"]."</td>
                <td>".$row["4-5"]."</td>
                <td>".$row["5-6"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

// Step 5: Close connection
$conn->close();
?>












