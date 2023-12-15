
<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$sql = "SELECT player_id FROM auction ORDER BY auction_id DESC LIMIT 1";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $player_id=$row["player_id"];
}
   
          
        $sql = "SELECT b.team_id, MAX(b.bid_price) AS max_bid, t.team_name,t.icon
        FROM bid b
        JOIN team t ON b.team_id = t.id
        WHERE b.player_id = $player_id
        GROUP BY b.team_id
        ORDER BY max_bid DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn));
}

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    echo "<table border='0' style='width: 50%;'>";
    echo "<tr>";
    echo "<th>Icon</th>";//Add team icon photo
    echo "<th>Team Name</th>";
    echo "<th>Max Bid</th>";
   
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $icon= $row['icon'];
        $team_id = $row['team_id'];
        $max_bid = $row['max_bid'];
        $team_name = $row['team_name'];

        ?>
        <tr>
        <td><img src="../Addteam/teamicon/<?php echo $icon; ?>" class="profile-img" style="width: 40px; height: 40px;"></td>
        <?php
        echo "<td>" . strtoupper($team_name) . "</td>";
        echo "<td>" . strtoupper($max_bid) . "</td>";
        echo "</tr>";
        
    }

    echo "</table>";
    }
 else {
    echo "<br>";}

    
 



?>