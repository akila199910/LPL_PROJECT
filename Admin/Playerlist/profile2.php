<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_GET['player_id'])) {
    $player_id = $_GET['player_id'];
} 
$sqlMaxBidID = "SELECT MAX(bid_price) AS max_bid FROM bid WHERE player_id = $player_id";


$resultMaxBidID = mysqli_query($conn, $sqlMaxBidID);

if (!$resultMaxBidID) {
    die("Error in SQLMaxBid: " . mysqli_error($conn));
}

// Check if any rows were returned
if (mysqli_num_rows($resultMaxBidID) > 0) {
    $rowMaxBidID = mysqli_fetch_assoc($resultMaxBidID);
    $maxBid = $rowMaxBidID["max_bid"];
//$team_id = $rowMaxBidID["team_id"];
} else {
    $maxBid=0;
    
}

// Now, you can fetch additional information from the 'register' and 'batsman' tables
$sql2 = "SELECT register.player_id, register.first_name,
register.last_name,register.country,register.dob,register.profile_photo,
register.catogary,bowler.bowl_style,bowler.lpl_nom,bowler.t20_nom,bowler.wickets,
bowler.bowl_average,bowler.economy,bowler.best_bowl,bowler.w5,
bowler.besed_price
         FROM register
         INNER JOIN bowler ON register.player_id = bowler.player_bowlling_id
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
        echo "Bowling Style: " . $row2["bowl_style"] . "<br>";
        echo "LPL Matches: " . $row2["lpl_nom"] . "<br>";
        echo "T20 Matches: " . $row2["t20_nom"] . "<br>";
        echo "Wickets: " . $row2["wickets"] . "<br>";
        echo "Bowling Average: " . $row2["bowl_average"] . "<br>";
        echo "Economy: " . $row2["economy"] . "<br>";
        echo "Best Bowling: " . $row2["best_bowl"] . "<br>";
        echo "5 - Wicket: " . $row2["w5"] . "<br>";
        echo "Based Price: " . $row2["besed_price"] . "<br>";
    }
} else {
    echo "No matching data found for player ID: $player_id<br>";
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Player Details</title>
    </head>
<body>
    <br> 
   
    <p id="countdown"></p>
    <p id="bid"></p>
    <p id="contain"></p>

    <script>
        $(document).ready(function () {
            
                setInterval(function () {
                    $("#countdown").load("time.php");
                }, 1000);
           
        });
    </script>
</body>
</html>
