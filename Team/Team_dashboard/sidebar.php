
<?php
     
    include "conn.php";
    mysqli_select_db($conn,"lplsystem");
    //session_start(); 

    if(isset($_SESSION['team_id'])) {
        // echo $_SESSION['team_id'];
     } else {
         header("Location: logout.php");
         exit; // Make sure to exit after redirect
     }
   
   /* $sql= "SELECT * FROM team";
    $results=mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($results))   {

        $name=$row['team_name'];
        $email=$row['email'];
        $profile_picture=$row['icon'];
        $id=$row['id'];
    }  */   

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="sidebarstyle.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>
<body>





<div class="sidebar">
    <!--<img  alt="Profile Picture" class="profile-img"> -->
    
    <div class="name">
        
    <?php

 
$qry1 = "SELECT team_name FROM team WHERE id='{$_SESSION['team_id']}'";


$resultqry1 = mysqli_query($conn, $qry1);

    if (!$resultqry1) {
        die("Error in SQL2: " . mysqli_error($conn));
    }
    
    if (mysqli_num_rows($resultqry1) > 0) {
        while ($row11 = mysqli_fetch_assoc($resultqry1)) {
            $team_name= $row11['team_name'];
        }
    } else {
              echo "No matching data found for team Id:<br>";
            }
    echo $team_name;
  
//image insert

    $qry2 = "SELECT icon FROM team WHERE id='{$_SESSION['team_id']}'";
    $resultqry2 = mysqli_query($conn, $qry2);

    if (!$resultqry2) {
        die("Error in SQL2: " . mysqli_error($conn));
    }
    
    if (mysqli_num_rows($resultqry2) > 0) {
        while ($row12 = mysqli_fetch_assoc($resultqry2)) {
            $icon= $row12['icon']; 
           
        }
    } else {
              echo "No matching data found for team Id:<br>";
            }?>
    <img src="../../Admin/Addteam/teamicon/<?php echo $icon; ?>" class="profile-img" style="width: 100px; height: 100px;">

   <!-- <img src="../../Admin/Addteam/teamicon . <?php// echo $icon;?>"  alt="">-->
<?php
//echo $icon;
            
      /*  $sql1="select icon from team where id=$id";
        $results=mysqli_query($conn,$sql1);*/
        
   

    ?>
    </div>
    <a href="team_dashboard.php" class="btn btn-primary btn-block">HOME</a>
    <!-- <a href="#" class="btn btn-primary btn-block"> 2</a>-->
    <a href="settings.php" class="btn btn-primary btn-block">SETTINGS</a>
    <a href="logout.php" class="btn btn-primary btn-block"> LOG OUT</a>
</div>