<?php

include("conn.php");
mysqli_select_db($conn,"lplsystem");
/*
$bid_price = $_POST['bid_price'];
$team_id = $_POST['team_id'];
$player_id = $_POST['player_id'];*/





if (isset($_POST['bid_price']) && isset($_POST['team_id']) && isset($_POST['player_id'])){
    $bid_price = $_POST['bid_price'];
    $team_id = $_POST['team_id'];
    $player_id = $_POST['player_id'];
    
   
}
$sqlBid = " INSERT INTO `bid`( `player_id`, `team_id`, `bid_price`) VALUES ('$player_id',' $team_id','$bid_price')";
    mysqli_query($conn, $sqlBid);



/*include("conn.php");
mysqli_select_db($conn, "lplsystem");


if(isset($_POST['submitBid'])){
    $bid_price = $_POST['bidsubmit'];
    $team_id = $_POST['teamid'];
    $player_id = $_POST['player_id'];
    
    $sqlBid = "INSERT INTO bid ('player_id', 'team_id', 'bid_price') VALUES ('$player_id', '$team_id', '$bid_price')";
    mysqli_query($conn, $sqlBid);
}*/
  ?>