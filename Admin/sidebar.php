
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
<link rel="stylesheet" href="/LPL_PROJECT/LPL_PROJECT/Admin/sidebarstyle.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="sidebar">
    <img src="/LPL_PROJECT/LPL_PROJECT/Admin/2023_10_07_10_29_IMG_5477.JPG" alt="Profile Picture" class="profile-img">
    <div class="name">
    <?php
        echo $name;
    ?>
    </div>
</body>
</html>

    <a href="/LPL_PROJECT/LPL_PROJECT/Admin/index.php" class="btn btn-primary btn-block">HOME</a>
    <a href="#" class="btn btn-primary btn-block"> 2</a>
    <a href="/LPL_PROJECT/LPL_PROJECT/Admin/logout.php" class="btn btn-primary btn-block"> LOG OUT</a>
</div>