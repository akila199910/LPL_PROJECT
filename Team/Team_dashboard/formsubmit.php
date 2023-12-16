<?php

include("conn.php");
mysqli_select_db($conn, "lplsystem");

$response = array(); // Create an array to store the response data

if (isset($_POST['bid_price']) && isset($_POST['team_id']) && isset($_POST['player_id'])) {
    $bid_price = $_POST['bid_price'];
    $team_id = $_POST['team_id'];
    $player_id = $_POST['player_id'];
}

$catogary = "SELECT catogary FROM register WHERE player_id = $player_id";
$catogaryResult = mysqli_query($conn, $catogary);

if ($catogaryResult && mysqli_num_rows($catogaryResult) > 0) {
    $row = mysqli_fetch_assoc($catogaryResult);
    $catogaryValue = $row['catogary'];

    switch ($catogaryValue) {
        case 'BATSMAN':
            $basedPrice = "SELECT based_price AS BidVALUE FROM batsman WHERE player_batting_id = $player_id";
            break;

        case 'BOWLER':
            $basedPrice = "SELECT based_price AS BidVALUE FROM bowler WHERE player_bowlling_id = $player_id";
            break;

        case 'WICKETKEEPER':
            $basedPrice = "SELECT based_price AS BidVALUE FROM wicketkeeper WHERE player_keeping_id = $player_id";
            break;

        case 'ALLROUNDER':
            $basedPrice = "SELECT base_price AS BidVALUE FROM allrounder WHERE player_al_id = $player_id";
            break;

        default:
            $basedPrice = "";
            break;
    }

    $result = mysqli_query($conn, $basedPrice);

    if ($result && mysqli_num_rows($result) > 0) {
        $rowb = mysqli_fetch_assoc($result);
        $baseValue = $rowb['BidVALUE'];

        if ((float)$bid_price >= (float)$baseValue) {
            $sqlBid = "INSERT INTO `bid` (`player_id`, `team_id`, `bid_price`) VALUES ('$player_id', '$team_id', '$bid_price')";
            mysqli_query($conn, $sqlBid);
            $response['success'] = true; // Indicate success
        } else {
            $response['success'] = false; // Indicate failure
            $response['message'] = 'Your bid price is less than based price'; // Error message
        }
    }
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);

?>
