<!DOCTYPE html>
<html lang="en">
<head>
    <title>Download Page</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<?php
session_start();
$a=$_SESSION['name'];
$file='$a.txt';
$f=fopen($file, 'w');
$servername = "localhost";
$username = "root";
$password = "Spr_6601";
$dbname = "lamp";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql="SELECT * FROM profile where name='$a';";
$result = $conn->query($sql);
$data=array();
$i=1;
$data[0]=array('name','course','skills','working_exp');
if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()) 
        {
            $data[$i]=array('name'=>$row['name'], 'course'=>$row['course'], 'skills'=>$row['skills'], 'work experience'=>$row['working_exp']);
            $i++;
        }
        file_put_contents('$a.txt', print_r($data[1], true));
        echo "Downloaded Successfully!!!";
    }
else
{
    echo "NIL";
}
$conn->close();
?>
<form action="index_user.php" method="post">
    <button type='submit'>Dashboard</button>
</form>
</body>
</html>




    