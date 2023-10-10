<?php
include("conn.php"); // Include your database connection file
mysqli_select_db($conn, "lplsystem");

// Get player_id from the POST data
$player_id = $_POST['player_id'];

// Get the current highest bid for the specified player
$sql = "SELECT MAX(bid_price) AS highest_bid FROM bid WHERE player_id = $player_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $highestBid = $row['highest_bid'];
    echo number_format($highestBid, 2); // Format the bid price
} else {
    echo "0.00"; // Default value if there are no bids
}

mysqli_close($conn);
?>
