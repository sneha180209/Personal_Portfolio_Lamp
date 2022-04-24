<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
</head>
<body>
<?php
session_start();
include 'header.php';
?>
<center><h1>Login Form</h1></center>   
    <form action="" method="post">  
        <input type="text" placeholder="Enter Username" name="name" required><br></br>
        <input type="password" placeholder="Enter Password" name="password" required><br></br>
        <button type="submit">Login</button><br></br>
        <input type="checkbox" checked="checked">  Remember me<br></br>
        <a href="#">   Forgot password?</a><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>    
    </form>    
    <?php
    include 'config.php';
    include 'footer.php';
    ?>
</body>
</html>
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
    $sql="Select * from registration;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
           if($name==$row['name'] && $pwd==$row['password'] && $row['id']==1)
           {
               $_SESSION['name']=$name;
               $_SESSION['password']=$pwd;
               header("location:index_user.php");
           }
           if($name==$row['name'] && $pwd==$row['password'] && $row['id']==2)
           {
               $_SESSION['name']=$name;
               $_SESSION['password']=$pwd;
               header("location:index_admin.php");
           }
           if($name==$row['name'] && $pwd==$row['password'] && $row['id']==0)
           {
               echo "Invalid Credentials";
           } 
        }    
    }
    else
    {
        echo "No existing Data";
    }
    $conn->close();
}
?>