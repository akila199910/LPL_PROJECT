<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");


//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {

  // Select records where sold is NULL in batsman and active is 1 in auction
$sql = "SELECT r.*, b.sold AS batsman_sold, b.gotoauction AS batsman_gotoauction, b.team_id AS batsman_team_id,
bo.sold AS bowler_sold, bo.gotoauction AS bowler_gotoauction, bo.team_id AS bowler_team_id,
wk.sold AS wicketkeeper_sold, wk.gotoauction AS wicketkeeper_gotoauction, wk.team_id AS wicketkeeper_team_id,
alr.sold AS allrounder_sold, alr.gotoauction AS allrounder_gotoauction, alr.team_id AS allrounder_team_id
FROM register r
LEFT JOIN batsman b ON r.player_id = b.player_batting_id
LEFT JOIN bowler bo ON r.player_id = bo.player_bowlling_id 
LEFT JOIN wicketkeeper wk ON r.player_id = wk.player_keeping_id 
LEFT JOIN allrounder alr ON r.player_id = alr.player_al_id 
WHERE (b.sold IS NOT NULL AND b.gotoauction = 1)
OR (bo.sold IS NOT NULL AND bo.gotoauction = 1)
OR (wk.sold IS NOT NULL AND wk.gotoauction = 1)
OR (alr.sold IS NOT NULL AND alr.gotoauction = 1);
";
$result = mysqli_query($conn, $sql);



} else {
  header("Location: ../logout.php");
}



?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<style>
    td{
      vertical-align: middle;
    }
    .text{
      text-align: center;
    }

  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Sold List</title>
  <style>

.header{
    background: radial-gradient(#fff,#5960de);
    height: 500vh;
}


.card{
    width: 75%;
    max-width: 3000px;
    color: #000;
    text-align: center;
    padding: 50px 35px;
    border: 1px solid rgba(255,255,255,0.3);
    background: rgba(255,255,255,0.2);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(5px);
    margin-left: auto;
    margin-right: 75px;

}

.navbar{
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: #4169E1;
}

nav{
    flex: 1;
    text-align: right;
}

nav ul{
    display: inline-block;
    list-style-type: none;
}

nav ul li{
    display: inline-block;
    margin-right: 20px;
}

nav ul li i{
    margin-right: 15px;

}

a{
    text-decoration: none;
    color: #555;
}

p{
    color: #fff;
    text-align:center;
}

</style>
</head>
<div class="header">

<body>
<?php

include('sidebar.php');
?>
  <div class="navbar row">
        <div class="logo col-4" >
           <img src="../../images/lpllogo.png" width="125px"> 
        </div>

        <div class="col-8" style="color: #fff; font-size:20px;">   LPL - LANKA PREMIER LEAGUE</div>
        </nav>
       
    </div>
    <br>
  <div class="card" data-tilt>
  <br>

  <div class="container">
  <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th>Profile Photo</th>
          <th>Name</th>
          <th>Catogary</th>
          <th>Country</th>
        </tr>
      </thead>
      <tbody class="table table-hover text-center">
      <?php
      while($row=mysqli_fetch_assoc($result)){
        $photoPath = $row['profile_photo'];?>
  
      <td> 
                          
      
    <img   src="../../Register/Img/proimg/<?php echo $photoPath?>" alt="Profile Picture" style="width: 100px; height: 100px; border-radius: 50%;">
                            
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

