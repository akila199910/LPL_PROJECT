<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");




$sql = "SELECT auction_start_time, auction_end_time,player_id FROM auction WHERE active=0 ORDER BY auction_id DESC LIMIT 1";


$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $auctionStartTime = $row["auction_start_time"];
    $auctionEndTime = $row["auction_end_time"];
    $player_id=$row["player_id"];
    $current_time = time();
    $current_time_formatted = date("Y-m-d H:i:s", $current_time);
    
    $timeDifference = strtotime($auctionEndTime) - strtotime($current_time_formatted);
    
    

    
} 

if (isset($timeDifference)) {

if($timeDifference==0 || $timeDifference<0)
{

   
  
    
        
}  else{
        echo "<h1>".$timeDifference."</h1>";
        }    
}

else{
    echo "<h1>Auction Time Out</h1>";
}
?> 