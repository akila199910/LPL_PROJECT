<?php
// Include your database connection or any necessary setup here
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$sql = "SELECT player_id FROM auction WHERE active=0 ORDER BY auction_id DESC LIMIT 1";


$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $player_id=$row['player_id'];


    echo json_encode(['player_id' => $player_id]);
} else {
    echo json_encode(['error' => 'Unable to fetch data']);
}
?>

