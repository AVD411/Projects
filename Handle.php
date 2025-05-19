<?php
include('Wt.php');
$sql = "INSERT INTO details VALUES
('Varad','06/06/2003','Pune','7709947135')";
if(mysqli_query($conn,$sql))
{
    echo "Record added sucessfully. ";
}
else
    echo mysqli_error($conn);

?>