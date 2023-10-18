<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

// Retrieve player_id from the query string
if (isset($_GET['player_id'])) {
    $player_id = $_GET['player_id'];


// Check if player_id is provided
{
    $sql = "SELECT team_id, MAX(bid_price) FROM bid WHERE player_id = $player_id GROUP BY team_id DESC";
    $result = mysqli_query($conn, $sql);
}
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<br>Team ID: " . $row["team_id"] . " ";
                echo "Maximum Bid Price: " . $row["MAX(bid_price)"] . "<br>";
            }
        } else {
            echo "No bids found for player ID: $player_id";
        }
    } else {
        echo "Error in SQL: " . mysqli_error($conn);
    }
} 

?>
