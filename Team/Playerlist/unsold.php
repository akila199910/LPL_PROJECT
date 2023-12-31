<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");



//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {


    // Select records where sold is NULL in batsman and active is 1 in auction
$sql = "SELECT r.*, b.sold AS batsman_sold, b.gotoauction AS batsman_gotoauction,
bo.sold AS bowler_sold, bo.gotoauction AS bowler_gotoauction,
wk.sold AS wicketkeeper_sold, wk.gotoauction AS wicketkeeper_gotoauction,
alr.sold AS allrounder_sold, alr.gotoauction AS allrounder_gotoauction
FROM register r
LEFT JOIN batsman b ON r.player_id = b.player_batting_id
LEFT JOIN bowler bo ON r.player_id = bo.player_bowlling_id 
LEFT JOIN wicketkeeper wk ON r.player_id = wk.player_keeping_id 
LEFT JOIN allrounder alr ON r.player_id = alr.player_al_id 
WHERE (b.sold IS NULL AND b.gotoauction = 1)
OR (bo.sold IS NULL AND bo.gotoauction = 1)
OR (wk.sold IS NULL AND wk.gotoauction = 1)
OR (alr.sold IS NULL AND alr.gotoauction = 1);
";

$result = mysqli_query($conn, $sql);


if(isset($_POST['view'])){
  $player_id =  $_POST['player_id'];
  $catogary = "SELECT catogary FROM register WHERE player_id = $player_id";
  $catogaryResult = mysqli_query($conn, $catogary);

  if ($catogaryResult && mysqli_num_rows($catogaryResult) > 0) {
      $row = mysqli_fetch_assoc($catogaryResult);
      $catogaryValue = $row['catogary'];
    }
  
  if($catogaryValue=="BATSMAN"){
   // $sql = "UPDATE batsman SET gotoauction=NULL";
   // mysqli_query($conn, $sql);
    $current_time = time();

    $sql6 = "SELECT * from rule";
$resultTime = mysqli_query($conn, $sql6);

while ($rowTime = mysqli_fetch_assoc($resultTime)) {

$periadTime=$rowTime['auction_duration_time'];


}
$auction_end_time = $current_time + ($periadTime * 60); 
$sql5 = "SELECT player_id FROM auction ORDER BY auction_id DESC LIMIT 1";
$result = mysqli_query($conn, $sql5);

while ($rowID = mysqli_fetch_assoc($result)) {

$rowIDPlayer=$rowID['player_id'];

}
if($rowIDPlayer==$player_id){

header("Location: profile1.php?player_id=$player_id");
exit; 


}else{

// Convert the timestamps to formatted time strings
$current_time_formatted = date("Y-m-d H:i:s", $current_time);
$auction_end_time_formatted = date("Y-m-d H:i:s", $auction_end_time);
$sql6 = "INSERT INTO auction (`player_id`, `active`, `auction_start_time`, `auction_end_time`) VALUES ('$player_id', 0, '$current_time_formatted', '$auction_end_time_formatted')";
mysqli_query($conn, $sql6);
header("Location: profile1.php?player_id=$player_id");
exit;
  }
}



  if($catogaryValue=="BOWLER"){
    $player_id =  $_POST['player_id'];
   // $sql = "UPDATE bowler SET gotoauction=NULL";
   // mysqli_query($conn, $sql);
   $current_time = time();

   $sql6 = "SELECT * from rule";
$resultTime = mysqli_query($conn, $sql6);

while ($rowTime = mysqli_fetch_assoc($resultTime)) {

$periadTime=$rowTime['auction_duration_time'];


}
$auction_end_time = $current_time + ($periadTime * 60); 
$sql5 = "SELECT player_id FROM auction  ORDER BY auction_id DESC LIMIT 1";
$result = mysqli_query($conn, $sql5);

while ($rowID = mysqli_fetch_assoc($result)) {

$rowIDPlayer=$rowID['player_id'];

}
if($rowIDPlayer==$player_id){

header("Location: profile2.php?player_id=$player_id");
exit; 


}else{

// Convert the timestamps to formatted time strings
$current_time_formatted = date("Y-m-d H:i:s", $current_time);
$auction_end_time_formatted = date("Y-m-d H:i:s", $auction_end_time);
$sql6 = "INSERT INTO auction (`player_id`, `active`, `auction_start_time`, `auction_end_time`) VALUES ('$player_id', 0, '$current_time_formatted', '$auction_end_time_formatted')";
mysqli_query($conn, $sql6);
header("Location: profile2.php?player_id=$player_id");
exit;
 }

  }

  if($catogaryValue=="WICKETKEEPER"){
    $player_id =  $_POST['player_id'];
   // $sql = "UPDATE wicketkeeper SET gotoauction=NULL";
   // mysqli_query($conn, $sql);
   $current_time = time();

   $sql6 = "SELECT * from rule";
$resultTime = mysqli_query($conn, $sql6);

while ($rowTime = mysqli_fetch_assoc($resultTime)) {

$periadTime=$rowTime['auction_duration_time'];


}
$auction_end_time = $current_time + ($periadTime * 60); 
$sql5 = "SELECT player_id FROM auction ORDER BY auction_id DESC LIMIT 1";
$result = mysqli_query($conn, $sql5);

while ($rowID = mysqli_fetch_assoc($result)) {

$rowIDPlayer=$rowID['player_id'];

}
if($rowIDPlayer==$player_id){

header("Location: profile3.php?player_id=$player_id");
exit; 


}else{

// Convert the timestamps to formatted time strings
$current_time_formatted = date("Y-m-d H:i:s", $current_time);
$auction_end_time_formatted = date("Y-m-d H:i:s", $auction_end_time);
$sql6 = "INSERT INTO auction (`player_id`, `active`, `auction_start_time`, `auction_end_time`) VALUES ('$player_id', 0, '$current_time_formatted', '$auction_end_time_formatted')";
mysqli_query($conn, $sql6);
header("Location: profile3.php?player_id=$player_id");
exit;
 }
  }

  if($catogaryValue=="ALLROUNDER"){
    $player_id =  $_POST['player_id'];
   // $sql = "UPDATE allrounder SET gotoauction=NULL";
   // mysqli_query($conn, $sql);
   $current_time = time();

   $sql6 = "SELECT * from rule";
$resultTime = mysqli_query($conn, $sql6);

while ($rowTime = mysqli_fetch_assoc($resultTime)) {

$periadTime=$rowTime['auction_duration_time'];


}
$auction_end_time = $current_time + ($periadTime * 60); 
$sql5 = "SELECT player_id FROM auction ORDER BY auction_id DESC LIMIT 1";
$result = mysqli_query($conn, $sql5);

while ($rowID = mysqli_fetch_assoc($result)) {

$rowIDPlayer=$rowID['player_id'];

}
if($rowIDPlayer==$player_id){

header("Location: profile4.php?player_id=$player_id");
exit; 


}else{

// Convert the timestamps to formatted time strings
$current_time_formatted = date("Y-m-d H:i:s", $current_time);
$auction_end_time_formatted = date("Y-m-d H:i:s", $auction_end_time);
$sql6 = "INSERT INTO auction (`player_id`, `active`, `auction_start_time`, `auction_end_time`) VALUES ('$player_id', 0, '$current_time_formatted', '$auction_end_time_formatted')";
mysqli_query($conn, $sql6);
header("Location: profile4.php?player_id=$player_id");
exit;
 }
  }
}


} else {
    header("Location: ../Admin/logout.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Unsold List</title>
  <style>
    td{
      vertical-align: middle;
    }
    .text{
      text-align: center;
    }


    .navbar{
    display: flex;
    align-items: center;
    padding: 20px;
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

.bt{
    display: inline-block;
    background: #ff523b;
    
    padding: 8px 30px;
    margin: -40px 0;
    border-radius: 30px;
    transition: background 0.5s;
}

.bt:hover{
    background: #5960de;
}

  </style>
</head>
<div class="header">

<body>
<?php

include('sidebar.php');
?>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
    LPL - LANKA PREMIER LEAGUE
  </nav>
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
          <th>Back To Auction</th>

        </tr>
      </thead>
      <tbody class="table table-hover text-center">
      <?php
      while($row=mysqli_fetch_assoc($result)){
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $catogary=$row['catogary'];
        $country=$row['country'];
      ?>
      <td> 
                        
                           <?php $photoPath = "../../Register/Img/proimg/" . $row['profile_photo'];?>
                            <img src=<?php echo $photoPath?> alt='Profile Photo' style='width: 100px; height: 100px;border-radius: 50%;'>;
                         
                        </td>
       <td> <?php echo $row['first_name']." ".$row['last_name'];?></td>
       <td> <?php echo $row['catogary'];?></td>
       <td> <?php echo $row['country'];?></td>
       <td>
              <form  method="POST">
                <input type="hidden" name="player_id" value="<?php echo $row['player_id']; ?>">
                <button type="submit" name="view" class="bt">Push</button>
              </form>
            </td> 
       </tr>
      <?php

       }?>
    </tbody>
    </table>
    </div>
  </div>
    </body>
    </html>