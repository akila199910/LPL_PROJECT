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

$sql3 = "SELECT * FROM rule";
$RuleResult = mysqli_query($conn, $sql3);
if(mysqli_num_rows($RuleResult) > 0 &&$RuleResult) {

  $row = mysqli_fetch_assoc($RuleResult);
  $year = $row['auction_year'];
}

if (isset($timeDifference)) {

if($timeDifference==0 || $timeDifference<0)
{

   
  
    $sqlMaxBidID = "SELECT MAX(bid_price) AS max_bid FROM bid WHERE player_id = $player_id ORDER BY bid_id DESC LIMIT 1";
    $resultMaxBidID = mysqli_query($conn, $sqlMaxBidID);
    
    while($row = mysqli_fetch_assoc($resultMaxBidID)){

        $maxBid=$row['max_bid'];
        
            if (isset($maxBid)) {
                $sqlMaxTeamID = "SELECT team_id FROM bid WHERE player_id = $player_id AND bid_price = $maxBid";
                $resultMaxTeamID = mysqli_query($conn, $sqlMaxTeamID);

                if ($resultMaxTeamID && mysqli_num_rows($resultMaxTeamID) > 0) {
                    $rowMaxTeamID = mysqli_fetch_assoc($resultMaxTeamID);
                    $team_id = $rowMaxTeamID["team_id"];
                }

                $sqlupdate ="UPDATE `data` SET `sold_price`= $maxBid,`team_id`=$team_id WHERE player_id=$player_id AND year=$year";
                mysqli_query($conn, $sqlupdate);

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
                       
                       
                        break;
            
                    case 'BOWLER':
                        $updatePrice = "UPDATE bowler SET sold = $maxBid, team_id = $team_id WHERE player_bowlling_id = $player_id";
                        $resultUpdate = mysqli_query($conn, $updatePrice);
                        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
                         //$player_id = $_POST['player_bowling_id'];
                        $sqlupdate="UPDATE bowler SET gotoauction=1 WHERE player_bowlling_id=$player_id";
                        mysqli_query($conn,$sqlupdate);
                     
                        break;
            
                    case 'WICKETKEEPER':
                        $updatePrice = "UPDATE wicketkeeper SET sold = $maxBid, team_id = $team_id WHERE player_keeping_id = $player_id";
                        $resultUpdate = mysqli_query($conn, $updatePrice);
                        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
                         //$player_id = $_POST['player_keeping_id'];
                        $sqlupdate="UPDATE wicketkeeper SET gotoauction=1 WHERE player_keeping_id=$player_id";
                        mysqli_query($conn,$sqlupdate);
                    
                        break;
            
                    case 'ALLROUNDER':
                        $updatePrice = "UPDATE allrounder SET sold = $maxBid, team_id = $team_id WHERE player_al_id = $player_id";
                        $resultUpdate = mysqli_query($conn, $updatePrice);
                        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
                         //$player_id = $_POST['player_al_id'];
                        $sqlupdate="UPDATE allrounder SET gotoauction=1 WHERE player_al_id=$player_id";
                        mysqli_query($conn,$sqlupdate);
                      
                        break;
            
                    default:
                        // Handle other cases if needed
                        break;
                }


        }
        echo "<h3>Player Is Sold </h3>";
        
    } else{
        //echo $maxBid = 0;
        echo "<h1>Auction Time Out !!! <br> Push The New Player </h1>";
       

      
                         $catogary = "SELECT catogary FROM register WHERE player_id = $player_id";
                $catogaryResult = mysqli_query($conn, $catogary);
            
                if ($catogaryResult && mysqli_num_rows($catogaryResult) > 0) {
                    $row = mysqli_fetch_assoc($catogaryResult);
                    $catogaryValue = $row['catogary'];
              
            
                switch ($catogaryValue) {
                    case 'BATSMAN':
                       
                        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
                       
                        $sqlupdate="UPDATE batsman SET gotoauction=1 WHERE player_batting_id=$player_id";
                        mysqli_query($conn,$sqlupdate);
                       
                      
                        break;
            
                    case 'BOWLER':
                       
                        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
                       
                        $sqlupdate="UPDATE bowler SET gotoauction=1 WHERE player_bowlling_id=$player_id";
                        mysqli_query($conn,$sqlupdate);
                       
                        break;
            
                    case 'WICKETKEEPER':
                       
                        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
                       
                        $sqlupdate="UPDATE wicketkeeper SET gotoauction=1 WHERE player_keeping_id=$player_id";
                        mysqli_query($conn,$sqlupdate);
                      
                        break;
            
                    case 'ALLROUNDER':
                      
                        $updateActive = "UPDATE auction SET active = 1 WHERE player_id =  $player_id";
                         mysqli_query($conn, $updateActive);
                         
                        $sqlupdate="UPDATE allrounder SET gotoauction=1 WHERE player_al_id=$player_id";
                        mysqli_query($conn,$sqlupdate);
                      
                        break;
            
                    default:
                        // Handle other cases if needed
                        break;
                    }
                 }  
                     
                }
            }
        }       
        
        else{
                    echo "<h1>".$timeDifference."</h1>";
                 }    
    }else{
   
    echo "<h1>Auction Time Out !!! <br> Push The New Player </h1>";
   
    

}
?>

 