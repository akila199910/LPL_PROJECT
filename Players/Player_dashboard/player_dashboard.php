<?php


/*if (isset($_SESSION['user_id'])) {
    echo $_SESSION['user_id'];

} else {
    header("Location: logout.php");


}
*/
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Player</title>
  <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="/LPL_PROJECT/LPL_PROJECT/Players/Player_dashboard/sidebarstyle.css">
        <style>
          .size {
            width: 200px;
            height: 200px;
          }
          .btn-margin {
            margin-bottom: 15px;
          }
        </style>
</head>
<body>
<div class="sidebar"> 
 
  <div class="name">
    <?php
      echo $player_name;
    ?>
  </div>

  <a href="/LPL_PROJECT/LPL_PROJECT/Players/Player_dashboard/player_dashboard.php" class="btn btn-primary btn-block">Home</a>
    <a href="#" class="btn btn-primary btn-block">Profile</a>
    <a href="/LPL_PROJECT/LPL_PROJECT/contact_us.php" class="btn btn-primary btn-block">Contact</a>
    <a href="#" class="btn btn-primary btn-block">Live Auction</a>
    <a href="/LPL_PROJECT/LPL_PROJECT/Players/Player_dashboard/logout.php" class="btn btn-primary btn-block">Log Out</a>
      
</div>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
  LPL - LANKA PREMIER LEAGUE
</nav>  
<div class="content">
  <div class="container">
    <div class="row">
    <div class="row justify-content-center">
      <div class="col-lg-6">
      <form action="" class="form-box" method="POST" enctype="multipart/form-data">
        <div class="form-group col-6">
          <select name="identity" class="form-select" required>
            <option value="" disabled selected hidden>Select your team here</option>
            <option value="team1">Team1</option>
            <option value="team2">Team2</option>
            <option value="team3">Team3</option>
            <option value="team4">Team4</option>
            <option value="team5">Team5</option>
          </select>
        </div><br>
        <div class="form-group col-md-6 mb-2">
          <input type="int" id="co" name="price" placeholder="Price" class="form-control" required>
        </div>
        <div class="col-lg-6 justify-content-center">
        <input type="hidden" name="delete_id" value="<?php echo $row['player_batting_id']; ?>">
          <button type="submit" name="delete" id="delete" class="btn btn-primary btn-sm" >SUBMIT</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <?php
    $conn->close();
  ?>

</body>
</html>