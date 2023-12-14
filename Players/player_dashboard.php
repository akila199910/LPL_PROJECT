<?php

session_start();
include "conn.php";
mysqli_select_db($conn,"lplsystem");

if (!isset($_SESSION['user_id'])) {
    header("Location: logout.php");
    exit(); // It's recommended to stop script execution after redirection
}
$player_id = $_SESSION['user_id'];
// Fetch player's name based on the ID
$sql = "SELECT first_name,last_name,profile_photo FROM register WHERE player_id = $player_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $player_name = $row['first_name']." ".$row['last_name'];
    }
} else {
    $player_name = "Unknown";
}

  $team_query = "SELECT * FROM team";
    $result = mysqli_query($conn, $team_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Player</title>
  <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="sidebarstyle.css">
        <style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 130px;background: #01166f;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
  LPL - LANKA PREMIER LEAGUE
</nav>  
<div class="sidebar"> 
 
  <div class="name">
    <?php
      echo $player_name;
    ?>
  </div>

  <a href="player_dashboard.php" class="btn btn-primary btn-block">Home</a>
  <a href="#" class="btn btn-primary btn-block">Live Auction</a>
    <a href="contract.php" class="btn btn-primary btn-block">Contract</a>
    <a href="../contact_us.php" class="btn btn-primary btn-block">Contact</a>

    <a href="logout.php" class="btn btn-primary btn-block">Log Out</a>
      
</div>

<div class="content">
  <!--<p>ප්ලේයර් ලොග් උනාම පේන දේවල් ඔක්කොම මේ ඩිව් එක ඇතුලෙ හදන්න ඕන</p>-->
  <!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-25 w3-text-black">
    <img src="Josh.png" width="300" height="300">
  </header>

  <!--Player Informations Section -->
  <div class="w3-content w3-justify w3-text-black w3-padding-64" id="info">
    <h2 class="w3-text-black">Player Informations</h2>
    <hr style="width:200px" class="w3-opacity">
    <!--p><strong>Nationality&nbsp:&nbsp</strong><span id="playerLevel">&nbspEngland</span></p-->
    <table class="w3-text-black w3-table">
        <tr><td>Name</td><td>Jos Buttler</td></tr>
        <tr><td>Nationality</td><td>England</td></tr>
        <tr><td>Age</td><td>29</td></tr>
        <tr><td>Role</td><td>WicketKeeper</td></tr>
        <tr><td>Batting</td><td>Right Hand Batsman</td></tr>
    </table>
    
    <div class="w3-row w3-center w3-padding-16 w3-section w3-text-black">
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">8640</span><br>
        Runs
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">100</span><br>
        Half Centuries
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">50</span><br>
        Centuries
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">67.89</span><br>
        Average
      </div>
    </div>
</div>
 

</body>
</html>