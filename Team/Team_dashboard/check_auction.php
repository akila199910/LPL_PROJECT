<?php
// Include your database connection or any necessary setup here
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$sql = "SELECT auction_start_time, auction_end_time,player_id FROM auction WHERE active=0 ORDER BY auction_id DESC LIMIT 1";


$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $auctionEndTime = $row["auction_end_time"];
    $current_time = time();
    $current_time_formatted = date("Y-m-d H:i:s", $current_time);

    $timeDifference = strtotime($auctionEndTime) - strtotime($current_time_formatted);

    echo json_encode(['timeDifference' => $timeDifference]);
} else {
    echo json_encode(['error' => 'Unable to fetch data']);
}
?>
