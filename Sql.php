<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Search</title>
    <link rel="stylesheet" type="text/css" href="try.css">
    <style>

    </style>

</head>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WT_LAB";


$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_GET['searchTerm'])) {
    $searchTerm = $_GET['searchTerm'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve row(s) based on search term
    $sql = "SELECT * FROM odi_data WHERE Player_Name LIKE '%$searchTerm%'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            // Display the retrieved information
            echo "<div class='player-box'>";
            echo "<h2 class='player-name'>" . $row["Player_Name"] . "</h2>";
            echo "<div class='player-info'>";
            echo "<p><strong>Span:</strong> " . $row["Span"] . "</p>";
            echo "<p><strong>Matches:</strong> " . $row["Matches"] . "</p>";
            echo "<p><strong>Runs:</strong> " . $row["Runs"] . "</p>";
            echo "<p><strong>100s:</strong> " . $row["100"] . "</p>";
            echo "<p><strong>50s:</strong> " . $row["50"] . "</p>";
            echo "<p><strong>Strike Rate:</strong> " . $row["SR"] . "</p>";
            echo "<p><strong>Average:</strong> " . $row["Avg"] . "</p>";
            echo "<p><strong>Balls Faced:</strong> " . $row["BF"] . "</p>";
            echo "<p><strong>Highest score:</strong> " . $row["HS"] . "</p>";
            echo "<p><strong>Ducks:</strong> " . $row["0"] . "</p>";
            // Add more HTML code here to display other columns
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "No results found.";
    }

    $conn->close();
}
?>
</body>
</html>