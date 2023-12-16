<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {
    
    if (isset($_GET['player_id'])) {
        $player_id = $_GET['player_id'];
    } 
    $sqlMaxBidID = "SELECT MAX(bid_price) AS max_bid FROM bid WHERE player_id = $player_id";
    
    
    $resultMaxBidID = mysqli_query($conn, $sqlMaxBidID);
    
    if (!$resultMaxBidID) {
        die("Error in SQLMaxBid: " . mysqli_error($conn));
    }
    
    // Check if any rows were returned
    if (mysqli_num_rows($resultMaxBidID) > 0) {
        $rowMaxBidID = mysqli_fetch_assoc($resultMaxBidID);
        $maxBid = $rowMaxBidID["max_bid"];
    //$team_id = $rowMaxBidID["team_id"];
    } else {
        $maxBid=0;
        
    }
    
    // Now, you can fetch additional information from the 'register' and 'batsman' tables
    $sql2 = "SELECT register.player_id, register.first_name,
    register.last_name,register.country,register.dob,register.profile_photo,
    register.catogary,wicketkeeper.b_style,wicketkeeper.lpl_nom,wicketkeeper.t20_nom,wicketkeeper.runs,
    wicketkeeper.b_average,wicketkeeper.strike_rate,wicketkeeper.high_score,wicketkeeper.not_out,
    wicketkeeper.stumps,wicketkeeper.catch,wicketkeeper.based_price
             FROM register
             INNER JOIN wicketkeeper ON register.player_id = wicketkeeper.player_keeping_id
             WHERE register.player_id = $player_id";
    
    $result2 = mysqli_query($conn, $sql2);
    
    if (!$result2) {
        die("Error in SQL2: " . mysqli_error($conn));
    }
    
    // Check if any rows were returned
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $playerPhoto =$row2["profile_photo"];
            $playerName = $row2["first_name"]." ".$row2["last_name"];
            $playerCountry =  $row2["country"];
            $playerdob =$row2["dob"];
            $playercatogary =  $row2["catogary"];
            $playerb_style =  $row2["b_style"];
            $playerlpl_nom =  $row2["lpl_nom"];
            $playert20_nom =  $row2["t20_nom"];
            $playerruns = $row2["runs"];
            $playerb_average =  $row2["b_average"];
            $playerstrike_rate =  $row2["strike_rate"];
            $playerhigh_score =  $row2["high_score"];
            $playernot_out =  $row2["not_out"];
           
            $playerStump= $row2["stumps"] . "<br>";
            $playerCatch= $row2["catch"] . "<br>";
            $playerbased_price =  $row2["based_price"];
        }
    } else {
        echo "No matching data found for player ID: $player_id<br>";
    }



} else {
    header("Location: ../logout.php");
}






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Auction</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
    
    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

   
    .ntext1 {
      font-size: 1.5rem;
      font-weight: bold;
      color: #c87a7a;
    }
    .ntext2 {
      font-size: 1.5rem;
      font-weight: bold;
      color: #ce4a4a;
    }
    .ntext3 {
      font-size: 1.5rem;
      font-weight: bold;
      color: #ce5b;
    }

    .profile-pic {
      width: 200px; 
      height: 200px; 
      border-radius: 10%; 
      margin-right: 10px;
    }
    tr{
        margin-bottom:50px;
    }

    .header{
    background: radial-gradient(#fff,#5960de);
    height: 500vh;
}



  </style>
</head>
<div class="header">
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="ntext3"><?php echo strtoupper($playerName) ?></span>
  </div>
</nav>
<div class="container">


  <div class="row mt-5" >
    <div class="col-2 mt-5">
         <img class="profile-pic" src="../../Register/Img/proimg/<?php echo $playerPhoto?>" alt="Profile Picture">
    </div>
       
        <div class="col-5 mb-3  mt-5">
            <br>
            <table border="0"  style="width: 50%;" >
                <tr>
                    <th><h3><?php echo strtoupper($playerName) ?></h3></th>
                </tr>
                <tr>
                    <th><h4><?php echo strtoupper($playercatogary) ?></h4></th>
                </tr> 
                <tr>
                <th><h5><?php echo strtoupper($playerCountry) ?></h5></th>
                </tr> 
                <tr>
                <th><?php 
                    $birthdayDate = new DateTime($playerdob);
                    $currentDate = new DateTime();
          
                    // Calculate the difference between the current date and the birthday
                    $age = $currentDate->diff($birthdayDate)->y;
                    echo "<h4>".strtoupper($age)." YEARS</h4>"?></th>
                </tr> 
            </table>
    </div>
    <div class="col-5 mb-3  mt-5">
    <div id="countdown"></div>
    </div>
</div>


    <div class="row">
        <div class="col-6 mt-5">
            <table border="0"  style="width: 100%;" >
        <tr>
          <th>Batting Style :</th>
          <th><?php echo  $playerb_style;?></th>
        </tr>

      <tr>
          <th>LPL Matches :</th>
          <th><?php echo  $playerlpl_nom;?></th>
      </tr>

      <tr>
          <th>T - 20 Matches :</th>
          <th><?php echo  $playert20_nom;?></th>
      </tr>

      <tr>
          <th>Runs :</th>
          <th><?php echo  $playerruns;?></th>
      </tr>
      <tr>
          <th>Batiing Average :</th>
          <th><?php echo  $playerb_average;?></th>
      </tr>
      <tr>
          <th>Strike Rate :</th>
          <th><?php echo  $playerstrike_rate;?></th>
      </tr>
      <tr>
          <th>High Score :</th>
          <th><?php echo  $playerhigh_score;?></th>
      </tr>
      <tr>
          <th>Not Out :</th>
          <th><?php echo  $playernot_out;?></th>
      </tr> 
     
      <tr>
          <th>Stumps :</th>
          <th><?php echo  $playerStump;?></th>
      </tr>
      <tr>
          <th>Catch :</th>
          <th><?php echo   $playerCatch;?></th>
      </tr>
      <tr>
          <th>Based Price :</th>
          <th><?php echo  $playerbased_price;?></th>
      </tr>

  </table>
  </div>
  <div class="col-6 mt-5 ">
         <div id="bid"></div>
   </div>
  </div>
  </div>


    <p id="countdown"></p>
    
  
    
    <script>
        $(document).ready(function () {
            
                setInterval(function () {
                    $("#countdown").load("time.php");
                    $("#bid").load("bid.php");
                }, 1000);


                //setInterval(function () {
                   // $("#bid").load("bid.php");
               // }, 1000);
           
        });
    </script>
    </div>
</body>
</html>
