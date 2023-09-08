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

  <style>
    body,h1 {font-family: "Raleway", sans-serif}
    body, html {height: 100%}
    .bgimg {
    background-color: #57aede;
    min-height: 100%;
    background-position: center;
    background-size: cover;

    .w3-sidebar {width: 120px;background: #222;}
    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {margin-left: 300px; margin-right:300px}
    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {#main {margin-left: 0}}
    }
    </style>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Accept List</title>
</head>

<body class="wrapper">

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <div class="w3-display-topleft w3-padding-large w3-xlarge">
    <img src="5.png" width=300px; height=140px;>
    </div>

  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:115%;">
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
        </tr>
      </thead>
      <tbody class="table table-hover text-center">
      <?php
      while($row=mysqli_fetch_assoc($result)){
      ?>
      <td> <?php echo $row['player_id'];?></td>
      <td> <?php echo $row['profile_photo'];?></td>
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