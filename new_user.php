<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<?php
session_start();
if(isset($_GET['name']))
{
    $servername = "localhost";
    $username = "root";
    $password = "Spr_6601";
    $dbname = "lamp";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    $a=$_GET['name'];
    $sql="UPDATE registration SET id=1 where name='$a'";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }

    $sql="INSERT INTO profile values ('$a','','','');";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
    header("location:index_admin.php");
}
?>
</body>
</html>
   