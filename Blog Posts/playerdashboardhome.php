<?php

session_start();
include "conn.php";
mysqli_select_db($conn,"lplsystem");

 if(!isset($_SESSION['user_id'])) {
    header("Location: logout.php");
    exit(); // It's recommended to stop script execution after redirection
}
$player_id = $_SESSION['user_id'];

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
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}

.w3-row-padding img {margin-bottom: 12px}

/* Set the width of the sidebar to 130px */
.w3-sidebar {width: 130px;background: #01166f;}

/* Add a left margin to the "page content" that matches the width of the sidebar (130px) */
#main {
  margin-left: 130px;
  transition: margin-left 0.5s;
  overflow: hidden;
}

/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {
  #main {
    margin-left: 0;
  }
}
</style>
</head>
<body class="w3-light-blue">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-tiny w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="/LPL_PROJECT/LPL_PROJECT/images/logo main2.png" style="width:100%">

 
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-home w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Home</p>
  </a>

  <a href="batsmandashboard.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-bar-chart w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Performance</p>
  </a>
  
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-gavel w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Live Auction</p>
  </a>

  <a href="../contract.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-handshake-o w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Contract</p>
  </a>

  <a href="../../contact_us.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-envelope w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Contact</p>
  </a>

  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
    <i class="fa fa-cog w3-xlarge" style="color:white"></i>
    <p style="color:antiquewhite">Account Settings</p>
  </a>

  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey">
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
    <a href="/LPL_PROJECT/LPL_PROJECT/contact_us.php" class="w3-bar-item w3-button" style="width:25% !important">Contact</a>
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">Account Settings</a>
    <a href="logout.php" class="w3-bar-item w3-button" style="width:25% !important">Log Out</a>

  </div>
</div>

<!-- Main content area -->
<div id="main">

  
  <iframe src="http://localhost/LPL_PROJECT/LPL_PROJECT/Blog%20Posts/blog.php" width="100%" height="740px" frameborder="0"></iframe>

</div>
</body>
</html>



