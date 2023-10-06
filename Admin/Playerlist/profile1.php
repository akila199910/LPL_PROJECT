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

$sql = "SELECT auction_start_time, auction_end_time FROM auction WHERE player_id = $player_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $auctionStartTime = $row["auction_start_time"];
    $auctionEndTime = $row["auction_end_time"];

} else {
      echo "No auction data found for player ID: $player_id";
}

//$timeDifference = strtotime($auctionEndTime) - strtotime($auctionStartTime);
echo $auctionEndTime."<br>";

// time 1 button eka ebuwama ganna balana tena patan gatta code eka
$current_time = time();
$current_time_formatted = date("Y-m-d H:i:s", $current_time);
echo $current_time_formatted;
$timeDifference = strtotime($auctionEndTime) - strtotime($current_time_formatted);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Details</title>
</head>
<body>
    
    <br> <button id="startAuction" name="start">Start Auction</button>
    <p id="countdown"></p>

    <script>
// Countdown timer
// Countdown timer
let countdown = <?php echo $timeDifference; ?>;
function updateCountdown() {
    const countdownElement = document.getElementById("countdown");
    countdownElement.textContent = `Time Left: ${countdown} seconds`;
    if (countdown <= 0) {
        countdownElement.textContent = "Auction Ended";
        
        // AJAX request to update the active status
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "update_active.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // You can handle the response if needed
            }
        };
        xhr.send(`player_id=<?php echo $player_id; ?>`);
    } else {
        countdown--;
        setTimeout(updateCountdown, 1000); // Update the countdown every 1 second
    }
}

// Add an event listener to the Start Auction button
const startAuctionButton = document.getElementById("startAuction");
startAuctionButton.addEventListener("click", () => {
    startAuctionButton.disabled = true; // Disable the button once the auction starts
    updateCountdown();});


    </script>
</body>
</html>
