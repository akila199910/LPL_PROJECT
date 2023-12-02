<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");


if (isset($_POST['player_id'])) {

    $player_id=$_POST['player_id'];


    $sql2 = "SELECT register.player_id, register.first_name,
    register.last_name,register.country,register.dob,register.profile_photo,
    register.catogary,batsman.b_style,batsman.lpl_nom,batsman.t20_nom,batsman.runs,
    batsman.b_average,batsman.strike_rate,batsman.high_score,batsman.not_out,
    batsman.fifty,batsman.hundred,batsman.based_price
    FROM register
    INNER JOIN batsman ON register.player_id = batsman.player_batting_id
    WHERE register.player_id = $player_id";
    $result2 = mysqli_query($conn, $sql2);

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
            $playerfifty =  $row2["fifty"];
            $playerhundred =  $row2["hundred"];
            $playerbased_price =  $row2["based_price"];
        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
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



  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="ntext3"><?php echo strtoupper($playerName) ?></span>
  </div>
</nav>
<div class="container">


  <div class="row mt-5" >
    <div class="col-2 mt-5">
         <img class="profile-pic" src="/LPL_PROJECT/LPL_PROJECT/Register/Img/proimg/<?php echo $playerPhoto?>" alt="Profile Picture">
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
          <th>Half Centuries :</th>
          <th><?php echo  $playerfifty;?></th>
      </tr>
      <tr>
          <th>Centuries :</th>
          <th><?php echo  $playerhundred;?></th>
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
