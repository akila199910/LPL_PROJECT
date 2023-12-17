
<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$sql = "SELECT player_id FROM auction ORDER BY auction_id DESC LIMIT 1";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $player_id=$row["player_id"];
}
   
          
        $sql1 = "SELECT MAX(bid_price) AS max_bid
        FROM bid 
        WHERE player_id = $player_id";

$result1 = mysqli_query($conn, $sql1);

if (!$result1) {
    die("Error in SQL query: " . mysqli_error($conn));
}


if (mysqli_num_rows($result1) > 0) {
    
    while ($row1 = mysqli_fetch_assoc($result1)) {
        
       echo $max_bid = $row1['max_bid'];
        
    }
    }

?>