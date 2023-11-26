<?php

include("conn.php");
mysqli_select_db($conn,"lplsystem");
$sql="SELECT player_id ,profile_photo,first_name,last_name,catogary,country,moderators_id from register WHERE approved='No'";

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

  <title>Reject List</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue; width:100%;">
    LPL - LANKA PREMIER LEAGUE
  </nav>

  <div class="container">
  <table class="table table-hover text-center">
      <thead>
        <tr>
        <th>#ID</th>
          <th>Profile Photo</th>
          <th>Name</th>
          <th>Catogary</th>
          <th>Country</th>
          <th>Moderatora ID</th>
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
       <td> <?php echo $row['moderators_id'];?></td>         
       </tr>
      <?php
       }?>
    </tbody>
    </table>
    </div>
    </body>
    </html><?php

