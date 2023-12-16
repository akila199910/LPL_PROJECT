<?php

session_start();
include "conn.php";
mysqli_select_db($conn,"lplsystem");

 if(!isset($_SESSION['user_id'])) {
    header("Location: logout.php");
    exit(); // It's recommended to stop script execution after redirection
}
$player_id = $_SESSION['user_id'];
// Fetch player's name based on the ID
$sql2 = "SELECT register.player_id, register.first_name,
    register.last_name,register.country,register.dob,register.profile_photo,
    register.catogary,batsman.b_style,batsman.lpl_nom,batsman.t20_nom,batsman.runs,
    batsman.b_average,batsman.strike_rate,batsman.high_score,batsman.not_out,
    batsman.fifty,batsman.hundred,batsman.based_price
             FROM register
             INNER JOIN batsman ON register.player_id = batsman.player_batting_id
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
            $playercategory = $row2["catogary"];
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
$Catogary= "SELECT catogary FROM register WHERE player_id=$player_id";
        $CatogaryRsult=mysqli_query($conn, $Catogary);
        
        
        if (mysqli_num_rows($CatogaryRsult) > 0) {
            while ($row4 = mysqli_fetch_assoc($CatogaryRsult)) {
                $PlayerCatogary= $row4["catogary"];
            }
            switch ($PlayerCatogary) {
                case 'BATSMAN':
                    
                  $path = '../Players/Batsman/batsmandashboard.php';
                  break;
                   
        
                case 'BOWLER':
                   
                  $path = '../Players/Bowler/bowllerdashboard.php';
                  break;
        
                case 'WICKETKEEPER':
                    
                  $path = '../Players/Wicketkeeper/wicketkeeperdashboard.php';
                   
                    break;
        
                case 'ALLROUNDER':
                  
                    
                  $path = '../Players/Allrounder/Allrounderdashboard.php';
                    
                    break;
        
                default:
                    break;
            }
            //echo   $PlayerCatogary;
            //echo $page;

        }





   /* if ($playercategory == 'BATSMAN') {
      $path = '../Players/Batsman/batsmandashboard.php';
  } elseif ($playercategory == 'BOWLER') {
      $path = '../Players/Bowler/bowllerdashboard.php';
  } elseif ($playercategory == 'WICKETKEEPER') {
      $path = '../Players/Wicketkeeper/wicketkeeperdashboard.php';
  } elseif ($playercategory == 'ALLROUNDER') {
      $path = '../Players/Allrounder/Allrounderdashboard.php';
  }*/
  

  $team_query = "SELECT * FROM team";
    $result = mysqli_query($conn, $team_query);
?>

<!DOCTYPE html>
<html>
<head>
<title>BatsmanDashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
body, h1, h2, h3, h4, h5, h6 {
    font-family: "Montserrat", sans-serif;
    margin: 0; /* Remove default margin */
    overflow: hidden; /* Hide scrollbars */
}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 130px;background: #01166f;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}


.navbar {
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: #4169E1;
    z-index: 1000;
    width: 100vw; 
    position: fixed; 
    top: 0; 
    left: 0; 
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

.header{
    background: radial-gradient(#fff,#5960de);
    
}

/* Add a left margin to the "page content" that matches the width of the sidebar (130px) */
#main {
  margin-left: 130px;
  transition: margin-left 0.5s;
  overflow: hidden;
  height: 91vh;
}

/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {
  #main {
    margin-left: 0;
  }
}

</style>
</head>
<div class="header">

<div class="navbar row">
        <div class="logo col-4" >
           <img src="../images/lpllogo.png" width="125px"> 
        </div>

        <div class="col-8" style="color: #fff; font-size:20px;">   LPL - LANKA PREMIER LEAGUE</div>
        </nav>
       
    </div>
    <br><br><br>
<body>

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-tiny w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  

  <a href="playerhome.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-home w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Home</p>
  </a>

  <a href="<?php echo $path?>" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-bar-chart w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Performance</p>
  </a>
  
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-gavel w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Live Auction</p>
  </a>

  <a href="../Players/contract.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-handshake-o w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Contract</p>
  </a>

  <a href="../contact_us.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-envelope w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Contact</p>
  </a>

  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-cog w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Account Settings</p>
  </a>

  <a href="../Players/logout.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-sign-out w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Logout</p>
  </a>

</nav>


<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">

    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">Home</a>
    <a href="batsmandashboard.php" class="w3-bar-item w3-button" style="width:25% !important">Perfomance</a>
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">Live Auction</a>
    <a href="contract.php" class="w3-bar-item w3-button" style="width:25% !important">Contract</a>
    <a href="../contact_us.php" class="w3-bar-item w3-button" style="width:25% !important">Contact</a>
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">Account Settings</a>
    <a href="logout.php" class="w3-bar-item w3-button" style="width:25% !important">Log Out</a>

  </div>
</div>

<!-- Main content area -->
<div id="main">

  
  <iframe src="http://localhost/LPL_PROJECT/LPL_PROJECT/Blog%20Posts/blog.php" width="100%" height="100%" frameborder="0"></iframe>

</div>

</body>
</html>