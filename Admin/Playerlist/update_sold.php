<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_POST['player_id']) && isset($_POST['max_bid'])) {
    $player_id = $_POST['player_id'];
    $maxBid = $_POST['max_bid'];

    // Update batsman's sold column
    $updatePrice = "UPDATE batsman SET sold = $maxBid WHERE player_batting_id = $player_id";
    $resultUpdate = mysqli_query($conn, $updatePrice);
} else {
    echo "No player_id or max_bid received";
}
?>
