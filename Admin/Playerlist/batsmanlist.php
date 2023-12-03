<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {



  //batsmanlistcode
  $sql5 = "SELECT b.*, r.profile_photo, r.first_name,r.last_name,r.country
  FROM batsman b
  JOIN register r ON b.player_batting_id = r.player_id
  WHERE b.gotoauction IS NULL AND b.sold IS NULL;
  ";




$result = mysqli_query($conn, $sql5);
$sql6 = "SELECT * from rule";
$resultTime = mysqli_query($conn, $sql6);

while ($rowTime = mysqli_fetch_assoc($resultTime)) {

  $periadTime=$rowTime['auction_duration_time'];
  
      
 }









$sql2 = "CREATE TABLE IF NOT EXISTS auction (
  auction_id INT PRIMARY KEY AUTO_INCREMENT,
  player_id INT NOT NULL,
  auction_start_time TIMESTAMP,
  auction_end_time TIMESTAMP NULL,
  active INT NULL,
  FOREIGN KEY (player_id) REFERENCES register(player_id)
  )";
  mysqli_query($conn,$sql2);


  if(isset($_POST['push'])){
    $player_id = $_POST['player_batting_id'];
    //$sqlupdate="UPDATE batsman SET gotoauction=1 WHERE player_batting_id=$player_id";
    //mysqli_query($conn,$sqlupdate);

    $current_time = time();
    $auction_end_time = $current_time + ($periadTime * 60); 
  
    // Convert the timestamps to formatted time strings
    $current_time_formatted = date("Y-m-d H:i:s", $current_time);
    $auction_end_time_formatted = date("Y-m-d H:i:s", $auction_end_time);


    $sql5 = "SELECT player_id FROM auction WHERE player_id=$player_id";
    $result = mysqli_query($conn, $sql5);

    while ($rowID = mysqli_fetch_assoc($result)) {

      $rowIDPlayer=$rowID['player_id'];

    }


   if($rowIDPlayer==$player_id){

    header("Location: profile1.php?player_id=$player_id");
    exit; 


   }else{

    $sql6 = "INSERT INTO auction (`player_id`, `active`, `auction_start_time`, `auction_end_time`) VALUES ('$player_id', 0, '$current_time_formatted', '$auction_end_time_formatted')";
    mysqli_query($conn, $sql6);
    header("Location: profile1.php?player_id=$player_id");
    exit; // Make sure to exit after the redirect

   }


  
    
  }





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

 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Batsman Page</title>
  <style>
    td{
      vertical-align: middle;
    }
    .text{
      text-align: center;
    }

  </style>
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
        <th>Profile</th>
          <th>Name</th>
          <th>Country</th>
          <th>Auction</th>
        </tr>
      
      </thead>


      <tbody class="table table-hover text-center">
        
        <?php 

        
        while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr><td>
                            <?php
                            $photoPath = "../../Register/Img/proimg/" . $row['profile_photo'];
                            ?>
                            <img  class="profile-img" src=<?php echo $photoPath?> style='width: 100px; height: 100px;'alt='Profile'>

                        </td>
        <td class="text"> <?php echo $row['first_name']." ".$row['last_name'] ;?></td>
        <td class="text"> <?php echo $row['country'];?></td>
            <td>
              <form action="" method="POST">
                <input type="hidden" name="player_batting_id" value="<?php echo $row['player_batting_id']; ?>">
                <button type="submit" name="push">Push</button>
              </form>
            </td>
          </tr>
        <?php }
?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </div>
</body>
</html>
