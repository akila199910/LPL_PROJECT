<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$sql = "SELECT auction_start_time, auction_end_time,player_id FROM auction ORDER BY auction_id DESC LIMIT 1";


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

    $UpdateActive = "SELECT active FROM auction WHERE player_id = $player_id";
     mysqli_query($conn, $UpdateActive);
  
    $sqlMaxBidID = "SELECT MAX(bid_price) AS max_bid FROM bid WHERE player_id = $player_id";
    $resultMaxBidID = mysqli_query($conn, $sqlMaxBidID);
    //$resultMaxBidIDCount = mysqli_num_rows($resultMaxBidID);
    while($row = mysqli_fetch_assoc($resultMaxBidID)){

        $maxBid=$row['max_bid'];
        
            if (isset($maxBid)) {
                $sqlMaxTeamID = "SELECT team_id FROM bid WHERE player_id = $player_id AND bid_price = $maxBid";
                $resultMaxTeamID = mysqli_query($conn, $sqlMaxTeamID);

                if ($resultMaxTeamID && mysqli_num_rows($resultMaxTeamID) > 0) {
                    $rowMaxTeamID = mysqli_fetch_assoc($resultMaxTeamID);
                    $team_id = $rowMaxTeamID["team_id"];
                }
                $catogary = "SELECT catogary FROM register WHERE player_id = $player_id";
                $catogaryResult = mysqli_query($conn, $catogary);
            
                if ($catogaryResult && mysqli_num_rows($catogaryResult) > 0) {
                    $row = mysqli_fetch_assoc($catogaryResult);
                    $catogaryValue = $row['catogary'];
              
            
                switch ($catogaryValue) {
                    case 'BATSMAN':
                        // Update batsman's sold column
                        $updatePrice = "UPDATE batsman SET sold = $maxBid, team_id = $team_id WHERE player_batting_id = $player_id";
                        $resultUpdate = mysqli_query($conn, $updatePrice);
                        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
                         //$player_id = $_POST['player_batting_id'];
                        $sqlupdate="UPDATE batsman SET gotoauction=1 WHERE player_batting_id=$player_id";
                        mysqli_query($conn,$sqlupdate);
                        echo "ඔයා සෙල් උනා";
                       
                        break;
            
                    case 'BOWLER':
                        $updatePrice = "UPDATE bowler SET sold = $maxBid, team_id = $team_id WHERE player_bowlling_id = $player_id";
                        $resultUpdate = mysqli_query($conn, $updatePrice);
                        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
                         //$player_id = $_POST['player_bowling_id'];
                        $sqlupdate="UPDATE bowler SET gotoauction=1 WHERE player_bowlling_id=$player_id";
                        mysqli_query($conn,$sqlupdate);
                        echo "ඔයා සෙල් උනා";
                        break;
            
                    case 'WICKETKEEPER':
                        $updatePrice = "UPDATE wicketkeeper SET sold = $maxBid, team_id = $team_id WHERE player_keeping_id = $player_id";
                        $resultUpdate = mysqli_query($conn, $updatePrice);
                        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
                         //$player_id = $_POST['player_keeping_id'];
                        $sqlupdate="UPDATE wicketkeeper SET gotoauction=1 WHERE player_keeping_id=$player_id";
                        mysqli_query($conn,$sqlupdate);
                        echo "ඔයා සෙල් උනා";
                        break;
            
                    case 'ALLROUNDER':
                        $updatePrice = "UPDATE allrounder SET sold = $maxBid, team_id = $team_id WHERE player_al_id = $player_id";
                        $resultUpdate = mysqli_query($conn, $updatePrice);
                        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
                         //$player_id = $_POST['player_al_id'];
                        $sqlupdate="UPDATE allrounder SET gotoauction=1 WHERE player_al_id=$player_id";
                        mysqli_query($conn,$sqlupdate);
                        echo "ඔයා සෙල් උනා";
                        break;
            
                    default:
                        // Handle other cases if needed
                        break;
                }


        }       
    } else{
        //echo $maxBid = 0;
        echo "සෙට් නෑ සෙල් උනේ නෑ";
        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
        
    }
}
        
}  else{
        echo $timeDifference;
        }    
}
?> 