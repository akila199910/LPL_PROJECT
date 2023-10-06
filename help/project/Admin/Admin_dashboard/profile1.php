<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_GET['player_id'])) {
    $player_id = $_GET['player_id'];
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

mysqli_close($conn);
?>

<?php
include("conn.php"); // Include your database connection file
mysqli_select_db($conn, "lplsystem"); // Select your database

// Assuming you have the player_id, which is used to identify the auction entry

// Query to retrieve auction_start_time and auction_end_time for a specific player
$sql = "SELECT auction_start_time, auction_end_time FROM auction WHERE player_id = $player_id";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $auctionStartTime = $row["auction_start_time"];
    $auctionEndTime = $row["auction_end_time"];
    // Now you have the values of auction_start_time and auction_end_time
} else {
    // Handle the case where no rows are returned, or player_id doesn't exist
    echo "No auction data found for player ID: $player_id";
}

// Close the database connection
mysqli_close($conn);
?>

<?php
// Assuming you have retrieved $auctionStartTime and $auctionEndTime from your database
// Calculate the time difference in seconds
$timeDifference = strtotime($auctionEndTime) - strtotime($auctionStartTime);

// Set the initial countdown time to the time difference in seconds
//$initialCountdown = max($timeDifference, 0); // Ensure it's not negative
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Details</title>
</head>
<body>
    <form method="post">
        <button id="startAuction" name="start">Start Auction</button>
    </form>
    <p id="countdown"></p>

    <script>
        // Countdown timer
        
        //let countdown = <?php /*$timeDifference;*/ ?>
        let countdown = 60;
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
        const startAuctionButton = document.getElementById("startAuction");
        startAuctionButton.addEventListener("click", () => {
            startAuctionButton.disabled = true; // Disable the button once the auction starts
            updateCountdown();
        });
    </script>
</body>
</html>
