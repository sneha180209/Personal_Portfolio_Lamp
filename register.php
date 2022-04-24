<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Page</title>
</head>
<body>
<?php
include 'header.php';
?>
<center><h1>Register</h1></center>   
    <form action="" method="post">  
        <input type="text" placeholder="Enter Username" name="name" required><br></br>
        <input type="password" placeholder="Enter Password" name="password" required><br></br>
        <button type="submit">Register</button><br></br>
        Already have an account? <a href="login.php">Login</a><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br> 
    </form>    
    <?php
    include 'config.php';
    include 'footer.php';
    ?>
<?php
if(isset($_POST['name']))
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
$name=$_POST['name'];
$pwd=$_POST['password'];
$sql = "INSERT INTO registration VALUES('$name', '$pwd', 0);";
$result = $conn->query($sql);
$conn->close();
$to =$name+"@gmail.com" ;
$subject = "Account registered";
$txt = "Your account is registered. Wait for reply from admin.";
$headers = "From: sneha.gupta180902@gmail.com";
mail($to,$subject,$txt,$headers);
header("location:login.php");
}
?>
</body>
</html>
