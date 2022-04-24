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
    include 'header.php';
    include 'config.php';
    $servername = "localhost";
    $username = "root";
    $password = "Spr_6601";
    $dbname = "lamp";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully <br>";

    $sql="SELECT * from registration;";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            $a=$row['name'];
            if($row['id']==0)
            {
                echo "New User ".$row['name']." --- <a href='new_user.php?name=$a'>Add User</a><br>";
            }
            if($row['id']==1)
            {
                echo "Show information of ".$row['name']." --- <a href='update.php?name=$a'>Show Info</a><br>";
            }
        }
    }
    else
    {
        echo "No Exciting Data";
    }
    $conn->close();
    include 'navigation.php';
    include 'footer.php';
    ?>
</body>
</html>