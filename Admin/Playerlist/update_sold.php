<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_POST['player_id'])) {
    $player_id = $_POST['player_id'];

    // Set initial value for maxBid to 0
    $maxBid = 0;

    // Find the maximum bid for the player
    $sqlMaxBid = "SELECT MAX(bid_price) AS max_bid FROM bid WHERE player_id = $player_id";
    $resultMaxBid = mysqli_query($conn, $sqlMaxBid);

    if (!$resultMaxBid) {
        die("Error in SQLMaxBid: " . mysqli_error($conn));
    }

    // Check if any rows were returned
    if (mysqli_num_rows($resultMaxBid) > 0) {
        $rowMaxBid = mysqli_fetch_assoc($resultMaxBid);
        $maxBid = $rowMaxBid["max_bid"];
        $sqlMaxTeamID = "SELECT team_id FROM bid WHERE player_id = $player_id AND bid_price = $maxBid";
        $resultMaxTeamID = mysqli_query($conn, $sqlMaxTeamID);
        if (mysqli_num_rows($resultMaxTeamID) > 0) {
            $rowMaxTeamID = mysqli_fetch_assoc($resultMaxTeamID);
            $team_id = $rowMaxTeamID["team_id"];
        } else {
            echo "No maximum team found for player ID: $player_id<br>";
            $team_id = 0;
        }
    }else{
        $maxBid = 0;
        $team_id = 0;
        }

    // Find the team_id associated with the maximum bid
   /* $sqlMaxTeamID = "SELECT team_id FROM bid WHERE player_id = $player_id AND bid_price = $maxBid";
    $resultMaxTeamID = mysqli_query($conn, $sqlMaxTeamID);*/

    

    $catogary = "SELECT catogary FROM register WHERE player_id = $player_id";
    $catogaryResult = mysqli_query($conn, $catogary);

    if ($catogaryResult && mysqli_num_rows($catogaryResult) > 0) {
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
