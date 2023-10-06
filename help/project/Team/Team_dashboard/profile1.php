<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");


$sql2 = "SELECT player_id FROM auction WHERE active=0";
        $result= mysqli_query($conn, $sql2);
    
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $player_id=$row["player_id"];
            }
        }

        $sqlStartTime = "SELECT auction_start_time FROM auction WHERE active = 0";
$resultStartTime = mysqli_query($conn, $sqlStartTime);

if (mysqli_num_rows($resultStartTime) > 0) {
    $rowStartTime = mysqli_fetch_assoc($resultStartTime);
    $auctionStartTime = strtotime($rowStartTime["auction_start_time"]);
    $currentTime = time();
    $timeRemaining = $currentTime-$auctionStartTime;
} else {
    // Default time remaining if auction_start_time is not found
    $timeRemaining = 0;
}
 
    // Now, you can fetch additional information from the 'register' and 'batsman' tables
    $sql2 = "SELECT register.player_id, register.first_name,
    register.last_name,register.country,register.dob,register.profile_photo,
    register.catogary,batsman.b_style,batsman.lpl_nom,batsman.t20_nom,batsman.runs,
    batsman.b_average,batsman.strike_rate,batsman.high_score,batsman.not_out,
    batsman.fifty,batsman.hundred,batsman.based_price
             FROM register
             INNER JOIN batsman ON register.player_id = batsman.player_batting_id
             WHERE register.player_id = $player_id";

    $result2 = mysqli_query($conn, $sql2);

    if (!$result2) {
        die("Error in SQL2: " . mysqli_error($conn));
    }

    // Check if any rows were returned
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            echo $row2["profile_photo"] . "<br>";
            echo "First Name: " . $row2["first_name"] . "<br>";
            echo "Last Name: " . $row2["last_name"] . "<br>";
            echo "Country: " . $row2["country"] . "<br>";
            echo "Age: " . $row2["dob"] . "<br>";
            echo "Catogary: " . $row2["catogary"] . "<br>";
            echo "Batting Style: " . $row2["b_style"] . "<br>";
            echo "LPL Matches: " . $row2["lpl_nom"] . "<br>";
            echo "T20 Matches: " . $row2["t20_nom"] . "<br>";
            echo "Runs: " . $row2["runs"] . "<br>";
            echo "Batting Average: " . $row2["b_average"] . "<br>";
            echo "Strike Rate: " . $row2["strike_rate"] . "<br>";
            echo "High Score: " . $row2["high_score"] . "<br>";
            echo "Not Out: " . $row2["not_out"] . "<br>";
            echo "Fifty: " . $row2["fifty"] . "<br>";
            echo "Hundred: " . $row2["hundred"] . "<br>";
            echo "Based Price: " . $row2["based_price"] . "<br>";
        }
    } else {
        echo "No matching data found for player ID: $player_id<br>";
    }

    $sql2 = "CREATE TABLE IF NOT EXISTS bid (
        bid_id INT AUTO_INCREMENT PRIMARY KEY , 
       player_id INT,
       team_id INT,
      bid_price DECIMAL(10, 2),
       FOREIGN KEY (player_id) REFERENCES register(player_id)
       )";
    
    
       mysqli_query($conn, $sql2);
    
       
        session_start();
      $team_id=$_SESSION['team_id'];
    
       if (isset($_POST["submit"])) {
        $bid_price = $_POST['bid_price'];
        $sql2 = "INSERT INTO bid (player_id,team_id,bid_price) VALUES ($player_id,$team_id,$bid_price)";
       $result = mysqli_query($conn, $sql2);
       }

       
$sql = "SELECT team_id, MAX(bid_price)  FROM bid GROUP BY team_id desc";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<br>Team ID: " . $row["team_id"] . " ";
        echo "Maximum Bid Price: " . $row["MAX(bid_price)"] . "<br>";}
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Owner Bidding Page</title>
</head>
<body>
     <form method="post">
        <button id="LiveAuction" name="live">Live Auction</button>
    </form>
    <p id="countdown"></p>
    <script>
        // Countdown timer
        let countdown = <?php echo $timeRemaining; ?> // Set the initial countdown time in seconds

        function updateCountdown() {
            const countdownElement = document.getElementById("countdown");
            countdownElement.textContent = `Time Left: ${countdown} seconds`;

            if (countdown <= 0) {
                countdownElement.textContent = "Auction Ended";
                // You can add logic here to handle the end of the auction
            } else {
                countdown--;
                setTimeout(updateCountdown, 1000); // Update the countdown every 1 second
            }
        }

        // Add an event listener to the Start Auction button
        const startAuctionButton = document.getElementById("LiveAuction");
        startAuctionButton.addEventListener("click", () => {
            startAuctionButton.disabled = true; // Disable the button once the auction starts
            updateCountdown();
        });
    </script>

    <h2>Maximum Bid Prices by Team:</h2>
    <ul>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>Team ID: " . $row["team_id"] . ", Maximum Bid Price: " . $row["max_bid_price"] . "</li>";
            }
        }
        ?>
    </ul>
</body>
</html>
<?php
mysqli_close($conn);
?>
