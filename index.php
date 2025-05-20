<?php include 'user.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>SQL</title>

    <style>
    .container{
    width: 800px;
    height: 500px;
    justify-content: center;
    align-content: center;
    text-align: center;
    background-size: cover;
    background-color: #cadcff;
    border: 2px solid #333;
    border-radius: 20px;
    margin-left: 500px;
    margin-top: 200px;
    }
    
    </style>

</head>
<body>

    <?php
    if (!empty($dbga)) {
        foreach ($dbga as $row) {
            echo "PRN: " . $row[0] . " - Username: " . $row[1] . " - Password: " . $row[2] . "<br>";
        }
    }
    ?>
    <div class="container">
    <form method="post" action="user.php">
        PRN: <input type="text" name="prn" ><br><br>
        Username: <input type="text" name="username" ><br><br>
        Password: <input type="text" name="password" ><br><br>
        <button type="submit" name="add" value="true">Add</button>
        <button type="submit" name="update" value="true">Update</button>
        <button type="submit" name="delete" value="true">Delete</button>
        <button type="submit" name="search" value="true">Search</button>
        <button type="submit" name="read" value="true">Read All</button>
    </form>
</div>
    
</body>
</html>