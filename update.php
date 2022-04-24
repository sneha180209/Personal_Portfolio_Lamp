<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Page</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<center><h1>Update Your Portfolio</h1></center>
    <form action="" method="post">

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "Spr_6601";
$dbname = "lamp";
$a=$_SESSION["name"];
if($a=="admin")
{
    $a=$_GET["name"];
}
$conn = new mysqli($servername, $username, $password, $dbname);
$sql="SELECT * FROM profile where name='$a'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()) 
    {
        $co=$row['course'];
        $sk=$row['skills'];
        $we=$row['working_exp'];
        echo "Course <input type='text' placeholder='$co' name=course><br></br>";
        echo "Skills <input type='text' placeholder='$sk' name=skills><br></br>";
        echo "Work Exp. <input type='text' placeholder='$we' name=working_exp><br></br>";
        echo "<button type='submit'>Update</button>";
    }
}
if(isset($_POST['course']))
{
    $co=$_POST['course'];
    $sk=$_POST['skills'];
    $we=$_POST['working_exp'];
    $sql="UPDATE profile set course='$co', skills='$sk', working_exp='$we' WHERE name='$a'";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
    if($_SESSION["name"]=="admin")
    {
        header("location:index_admin.php");
    }
    else
    {
        header("location:index_user.php");
    }

}
?>
</body>
</html>


