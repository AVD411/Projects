<?php
include('Wt.php');
$dbga = [];
global $fgba;
$fgba = ["", "", ""];

if($_Post["Insert"])
    {
        $fgba[0] = $_POST['prn'] ?? '';
        $fgba[1] = $_POST['username'] ?? '';
        $fgba[2] = $_POST['password'] ?? '';
        $sql = "INSERT INTO login VALUES
        ('$fga[0]','$fga[1]','$fga[2]')";
        if(mysqli_query($conn,$sql))
        {
            echo "Record added sucessfully. ";
        }
        else
            echo mysqli_error($conn);
}

if($_Post["search"])
    {
        $dbga[0]=$_POST[fga[0]];
        $dbga[1]=$_POST[fga[1]];
        $dbga[2]=$_POST[fga[2]];
        $sql = "INSERT INTO login VALUES
        ('$fga[0]','$fga[1]','$fga[2]')";
        if(mysqli_query($conn,$sql))
        {
            echo "Record added sucessfully. ";
        }
        else
            echo mysqli_error($conn);
}

if($_Post["read"])
    {
        $dbga[0]=$_POST[fga[0]];
        $dbga[1]=$_POST[fga[1]];
        $dbga[2]=$_POST[fga[2]];
        $sql = "INSERT INTO login VALUES
        ('$fga[0]','$fga[1]','$fga[2]')";
        if(mysqli_query($conn,$sql))
        {
            echo "Record added sucessfully. ";
        }
        else
            echo mysqli_error($conn);
}
if($_Post["Update"])
    {
        $dbga[0]=$_POST[fga[0]];
        $dbga[1]=$_POST[fga[1]];
        $dbga[2]=$_POST[fga[2]];
        $sql = "INSERT INTO login VALUES
        ('$fga[0]','$fga[1]','$fga[2]')";
        if(mysqli_query($conn,$sql))
        {
            echo "Record added sucessfully. ";
        }
        else
            echo mysqli_error($conn);
}
?>