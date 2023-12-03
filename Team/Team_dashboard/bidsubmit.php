<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_POST['submit'])) {


    $bid_price = $_POST['bid_price'];
    $team_id=$_POST['team_id'];
    $player_id=$_POST['player_id'];

    $sql3 = "INSERT INTO bid (bid_price,team_id,player_id) VALUES ('$bid_price','$team_id','$player_id')";
  
    mysqli_query($conn, $sql3);
  
} 

?>
