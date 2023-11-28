<?php

session_start();
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "lplsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!isset($_SESSION['moderators_id'])) {
    header("Location: logout.php");
    exit(); // It's recommended to stop script execution after redirection
}
$moderator_id = $_SESSION['moderators_id'];
// Fetch moderator's name based on the ID
$sql = "SELECT first_name FROM moderators WHERE id = $moderator_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $moderator_name = $row['first_name'];
    }
} else {
    $moderator_name = "Unknown";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Moderator Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

.topnav {
  overflow: hidden;
  background-color:#f1f1f1 ;
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
  width:100px;
}

.topnav a.active {
  background-color: blue;
  color: white;
  width:100px;
}
.text-center h4 {
    text-align: center;
    background-color:light-blue;
    
    
}
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 100%}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      min-height: calc(100vh - 75px);
      width:300px;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
    .well.pending-card {
    /* Add desired background color */
    background-color: #f7f7f7;

    /* Add padding and border radius for styling */
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    cursor: pointer; /* Optional: Add a cursor change on hover */

    /* Add animation styles */
    animation-name: colorChange;
    animation-duration: 2s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
}

/* Define the animation keyframes */
@keyframes colorChange {
    0% {
        background-color: #f7f7f7; /* Initial background color */
    }
    50% {
        background-color: #ffcc00; /* First color change */
    }
    100% {
        background-color: #f7f7f7; /* Back to initial color */
    }
}
  </style>
</head>
<body>

<div class="topnav">
  <a class="active" href="/LPL_PROJECT/LPL_PROJECT/home.html">Home</a>
  <a href="/LPL_PROJECT/LPL_PROJECT/Moderator/Moderator_dashboard/logout.php">Log Out</a>
  <a href="/LPL_PROJECT/LPL_PROJECT/contact us page/index.php">Contact</a>
  <a href="/LPL_PROJECT/LPL_PROJECT/about.html">About</a>
  <div class="img">
    <img src="/LPL_PROJECT/LPL_PROJECT/images/lpllogo.png" width="300px" height="75px">
</div>
</div>



<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
    <div class="well">
    
    <?php
        //echo "<p>Moderator Id:{$_SESSION['moderators_id']}</p>";
        echo "<p>Moderator ID: $moderator_id</p>";
        echo "<p>Moderator Name: $moderator_name</p>";
    ?>
  </div>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="/LPL_PROJECT/LPL_PROJECT/Moderator/Moderator_dashboard/moderator_dashboard.php">Dashboard</a></li>
        <li><a href="/LPL_PROJECT/LPL_PROJECT/Moderator/ReviewPage.php">Pending List</a></li>
        <li><a href="/LPL_PROJECT/LPL_PROJECT/Moderator/Accept.php">Accept List</a></li>
        <li><a href="/LPL_PROJECT/LPL_PROJECT/Moderator/Reject.php">Reject List</a></li>
        <li><a href="/LPL_PROJECT/LPL_PROJECT/Moderator/Moderator_dashboard/logout.php">Log Out</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well text-center">
        <h4>LANKA PREMIER LEAGUE-MODERATOR DASHBOARD</h4>
        <p>This is the Moderator dashboard.<br>Moderator should review new players and accept or reject them.</p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Registered Players</h4>
            <p><?php
              $sql="SELECT * from register";
              $result=$conn-> query($sql);
              $count=0;
              if ($result-> num_rows > 0){
                  while ($row=$result-> fetch_assoc()) {
          
                      $count=$count+1;
                  }
              }
              echo $count;         
                      
            ?></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Approved Players</h4>
            <p><?php
              $sql="SELECT * from register where approved='Yes'";
              $result=$conn-> query($sql);
              $count=0;
              if ($result-> num_rows > 0){
                  while ($row=$result-> fetch_assoc()) {
          
                      $count=$count+1;
                  }
              }
              echo $count;         
                      
            ?></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Rejected Players</h4>
            <p><?php
              $sql="SELECT * from register where approved='No'";
              $result=$conn-> query($sql);
              $count=0;
              if ($result-> num_rows > 0){
                  while ($row=$result-> fetch_assoc()) {
          
                      $count=$count+1;
                  }
              }
              echo $count;         
                      
            ?></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well pending-card">
            <h4>Pending...</h4>
            <p><?php
              $sql="SELECT * from register where approved is NULL";
              $result=$conn-> query($sql);
              $count=0;
              if ($result-> num_rows > 0){
                  while ($row=$result-> fetch_assoc()) {
          
                      $count=$count+1;
                  }
              }
              echo $count;
                      
            ?></p> 
          </div>
        </div>
      </div>
      
  </div>
</div>
<?php
$conn->close();
?>
</body>
</html>
