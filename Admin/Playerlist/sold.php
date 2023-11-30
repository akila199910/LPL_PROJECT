<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");


//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {

  // Select records where sold is NULL in batsman and active is 1 in auction
$sql = "SELECT r.*, b.sold AS batsman_sold, b.gotoauction AS batsman_gotoauction,
bo.sold AS bowler_sold, bo.gotoauction AS bowler_gotoauction,
wk.sold AS wicketkeeper_sold, wk.gotoauction AS wicketkeeper_gotoauction,
alr.sold AS allrounder_sold, alr.gotoauction AS allrounder_gotoauction
FROM register r
LEFT JOIN batsman b ON r.player_id = b.player_batting_id
LEFT JOIN bowler bo ON r.player_id = bo.player_bowlling_id 
LEFT JOIN wicketkeeper wk ON r.player_id = wk.player_keeping_id 
LEFT JOIN allrounder alr ON r.player_id = alr.player_al_id 
WHERE (b.sold IS NOT NULL AND b.gotoauction = 1)
OR (bo.sold IS NOT NULL AND bo.gotoauction = 1)
OR (wk.sold IS NOT NULL AND wk.gotoauction = 1)
OR (alr.sold IS NOT NULL AND alr.gotoauction = 1)";
$result = mysqli_query($conn, $sql);



} else {
    header("Location: /LPL_PROJECT/LPL_PROJECT/Admin/logout.php");
}



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

  <title>Sold List</title>
</head>

<body>
<?php

include('../sidebar.php');
?>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
    LPL - LANKA PREMIER LEAGUE
  </nav>
  <div class="content">

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
    </div>
    </body>
    </html>

