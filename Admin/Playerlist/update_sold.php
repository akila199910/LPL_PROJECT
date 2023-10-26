<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_POST['player_id']) && isset($_POST['max_bid'])) {
    $player_id = $_POST['player_id'];
    $maxBid = $_POST['max_bid'];
   // $team_id = $_POST['team_id'];
   $sqlMaxTeamID = "SELECT team_id FROM bid WHERE player_id = $player_id and bid_price=$maxBid";
   $resultMaxTeamID = mysqli_query($conn, $sqlMaxTeamID);
   if (mysqli_num_rows($resultMaxTeamID) > 0) {
    $rowMaxTeamID = mysqli_fetch_assoc($resultMaxTeamID);
    $team_id = $rowMaxTeamID["team_id"];
//$team_id = $rowMaxBidID["team_id"];
} else {
    echo "No maximum team found for player ID: $player_id<br>";
}


//මෙතෙන්ට එන අයි ඩී එකට අදාලව උගෙ කැටගරි එක මොකද්ද බලල ස්විච් කේස් එකෙං හරි අදාල කැටගරි එකට අදාලව අප්ඩේට්
//කරන්න ඕන. දැනට බැට්ස්මන් ටේබල් එක විතරයි අප්ඩේට් වෙන්නෙ
$catogary = "SELECT catogary FROM register WHERE player_id = $player_id";
$catogaryResult = mysqli_query($conn, $catogary);


if ($catogaryResult && mysqli_num_rows($catogaryResult) > 0){
    $row = mysqli_fetch_assoc($catogaryResult);
    $catogaryValue = $row['catogary'];
}

    switch ($catogaryValue) {
        case 'bat':
            // Update batsman's sold column
            $updatePrice = "UPDATE batsman SET sold = $maxBid, team_id = $team_id WHERE player_batting_id = $player_id";
            $resultUpdate = mysqli_query($conn, $updatePrice);
            break;

        case 'bol':
            $updatePrice = "UPDATE bowler SET sold = $maxBid, team_id = $team_id WHERE player_bowlling_id = $player_id";
            $resultUpdate = mysqli_query($conn, $updatePrice);
            break;                                                                     

        case 'wk':
            $updatePrice = "UPDATE wicketkeeper SET sold = $maxBid, team_id = $team_id WHERE player_keeping_id = $player_id";
            $resultUpdate = mysqli_query($conn, $updatePrice);
            break;

        case 'alr':
            $updatePrice = "UPDATE allrounder SET sold = $maxBid, team_id = $team_id WHERE player_al_id = $player_id";
            $resultUpdate = mysqli_query($conn, $updatePrice);
            break;

        default:
            // Handle other cases if needed
            break;
    }
}

    
?>