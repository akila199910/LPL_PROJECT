<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

$sql="select * from register where approved='Yes'";

$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Accept List</title>
  <style>
  .topnav {
    overflow: hidden;
    background-color:lightblue ;
    height:75px;
  }
  
  .topnav a {
    float: right;
    color: light-blue;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 20px;
    height:75px;
  }
  
  .topnav a:hover {
    background-color: #ddd;
    color: black;
    
  }
  
  
  </style>
</head>

<body class="wrapper">
<div class="topnav">
  
  <a href="/LPL_PROJECT/LPL_PROJECT/Moderator/Moderator_dashboard/logout.php">Log Out</a>
  <a href="/LPL_PROJECT/LPL_PROJECT/Moderator/Moderator_dashboard/moderator_dashboard.php">Dashboard</a>
  <div class="img">
    <img src="/LPL_PROJECT/LPL_PROJECT/images/lpllogo.png" width="300px" height="75px">
</div>
</div>

<h4 style="text-align: center; color: #2980b9; font-weight: bold; text-decoration: underline;">ACCEPTED PLAYER LIST</h4>
   <div class="container">
  <table class="table table-hover text-center">
      <thead>
        <tr>
        <th>#ID</th>
          <th>Profile Photo</th>
          <th>Name</th>
          <th>Catogary</th>
          <th>Country</th>
        </tr>
      </thead>
      <tbody class="table table-hover text-center">
      <?php
      while($row=mysqli_fetch_assoc($result)){
      ?>
      <td> <?php echo $row['player_id'];?></td>
      <td>
                            <?php
                            $photoPath = "/LPL_PROJECT/LPL_PROJECT/Register/Img/proimg/" . $row['profile_photo'];
                            echo "<img src='$photoPath' alt='Profile Photo' style='width: 70px; height: 70px;'>";
                            ?>
                        </td>
       <td> <?php echo $row['first_name']." ".$row['last_name'];?></td>
       <td> <?php echo $row['catogary'];?></td>
       <td> <?php echo $row['country'];?></td>
 </tr>
      <?php
       }?>
    </tbody>
    </table>
    </div>
   
    </body>
    </html>