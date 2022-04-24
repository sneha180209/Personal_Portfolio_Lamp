<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<?php
session_start();
include 'header.php';
include 'config.php';
$a=$_SESSION['name'];
$b=$_SESSION['password'];
echo "<center><h3>My name is $a and my Enrollment Number is $b</center></h3><br>";
?>
<form action='update.php?name=$a' method='get'>
<button type='submit'>Your Portfolio</button></form>
<form action='download.php?name=$a' method='get'>
<button type='submit'>Download</button><br></br>
<?php
include 'navigation.php';
include 'footer.php';
?>
</body>
</html>

