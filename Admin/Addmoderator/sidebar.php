
<?php
      
    include "conn.php";
    mysqli_select_db($conn,"lplsystem");
    $sql="SELECT * FROM admin";
    $results=mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($results))   {

        $name=$row['first_name']." ".$row['last_name'];
        $email=$row['email'];
        $profile_picture=$row['profile_picture'];

    }     

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
    font-family: 'Arial', sans-serif;
}

.sidebar {
    height: 100vh;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #4169E1;
    padding-top: 90px;
    padding-left: 20px;
    padding-right: 20px;
    color: white;
}

.profile-img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 30px;
    margin-left: 25px;
    margin-top: 30px;

  
}

.name{
    font-size: 20px;
    margin-bottom: 50px;
   -webkit-text-fill-color: black;
    text-align: center;
}

.sidebar a {
    text-decoration: none;
    color: rgb(255, 255, 255);
    display: block;
    padding: 10px;
    margin-bottom: 30px;
    border-radius: 10px;
    transition: background-color 0.3s;
}

.sidebar a:hover {
    background-color: #555;
}

.content {
    margin-left: 250px;
    padding: 20px;
}
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="sidebar">
    <img src="../2023_10_07_10_29_IMG_5477.JPG" alt="Profile Picture" class="profile-img">
    <div class="name">
    <?php
        echo $name;
    ?>
    </div>
</body>
</html>

    <a href="../index.php" class="btn btn-primary btn-block">HOME</a>
    <a href="../Settings/settings.php" class="btn btn-primary btn-block">SETTINGS</a>
    <a href="../logout.php" class="btn btn-primary btn-block"> LOG OUT</a>
</div>