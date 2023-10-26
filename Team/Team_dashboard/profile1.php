<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$playersql="SELECT player_id FROM auction WHERE active=0";
$idResult=mysqli_query($conn, $playersql);

if (mysqli_num_rows($idResult) > 0) {
    while ($row3 = mysqli_fetch_assoc($idResult)) {
        $player_id= $row3["player_id"];
    }
} else {
    echo "No matching data found for player ID:<br>";
}
$Catogary= "SELECT catogary FROM register WHERE player_id=$player_id";
$CatogaryRsult=mysqli_query($conn, $Catogary);


if (mysqli_num_rows($CatogaryRsult) > 0) {
    while ($row4 = mysqli_fetch_assoc($CatogaryRsult)) {
        $PlayerCatogary= $row4["catogary"];
    }
}
if($PlayerCatogary=='bat'){
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
}
//එල්ස් එක මෙතනින් පටං ගන්න කැටගරි එක තෝරන එකේ.....
elseif($PlayerCatogary=='bol'){
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
}


elseif($PlayerCatogary=='wk'){
    $sql2 = "SELECT register.player_id, register.first_name,
register.last_name,register.country,register.dob,register.profile_photo,
register.catogary,wicketkeeper.b_style,wicketkeeper.lpl_nom,wicketkeeper.t20_nom,wicketkeeper.runs,
wicketkeeper.b_average,wicketkeeper.strike_rate,wicketkeeper.high_score,wicketkeeper.not_out,
wicketkeeper.stumps,wicketkeeper.catch,wicketkeeper.based_price
         FROM register
         INNER JOIN wicketkeeper ON register.player_id = wicketkeeper.player_keeping_id
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
        echo "Stumps: " . $row2["stumps"] . "<br>";
        echo "Catch: " . $row2["catch"] . "<br>";
        echo "Based Price: " . $row2["based_price"] . "<br>";
    }
} else {
    echo "No matching data found for player ID: $player_id<br>";
}

}
elseif($PlayerCatogary=='alr'){
    $sql2 = "SELECT register.player_id, register.first_name,
    register.last_name,register.country,register.dob,register.profile_photo,
    register.catogary,allrounder.b_style,allrounder.lpl_nom,allrounder.t20_nom,allrounder.runs,
    allrounder.b_average,allrounder.strike_rate,allrounder.high_score,allrounder.not_out,
    allrounder.fifty,allrounder.hundred,allrounder.bowl_style,allrounder.wickets
    ,allrounder.bowl_average,allrounder.economy,allrounder.best_bowl,allrounder.w5,allrounder.base_price
             FROM register
             INNER JOIN allrounder ON register.player_id = allrounder.player_al_id
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
        echo "Bowling Style: " . $row2["bowl_style"] . "<br>";
        echo "Wickets: " . $row2["wickets"] . "<br>";
        echo "Bowling Average: " . $row2["bowl_average"] . "<br>";
        echo "Economy: " . $row2["economy"] . "<br>";
        echo "Best Bowling: " . $row2["best_bowl"] . "<br>";
        echo "5 - Wicket: " . $row2["w5"] . "<br>";
        echo "Based Price: " . $row2["based_price"] . "<br>";
    }
} else {
    echo "No matching data found for player ID: $player_id<br>";
}

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
echo $current_time_formatted."<br><br>";
$timeDifference = strtotime($auctionEndTime) - strtotime($current_time_formatted);

// bid eke php codes

$sql2 = "CREATE TABLE IF NOT EXISTS bid (
    bid_id INT AUTO_INCREMENT PRIMARY KEY , 
   player_id INT,
   team_id INT,
  bid_price DECIMAL(10, 2),
   FOREIGN KEY (player_id) REFERENCES register(player_id),
FOREIGN KEY (team_id) REFERENCES team(team_id) 
   )";
mysqli_query($conn, $sql2);

   
    session_start();
  $team_id=$_SESSION['team_id'];

   if (isset($_POST["submit"])) {
    $bid_price = $_POST['bid_price'];
    $sql2 = "INSERT INTO bid (player_id,team_id,bid_price) VALUES ($player_id,$team_id,$bid_price)";
   $result = mysqli_query($conn, $sql2);
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Player Details</title>
</head>
<body>

<br>
<button id="JoinAuction" name="JoinAuction">Join Auction</button>
<p id="countdown"></p><br>

<div id="bidding"></div>

<form id="bidForm" action="" method="POST">
    <p>Place Bid Price</p>
    <input type="text" name="bid_price" id="bid_price" <?php echo ($timeDifference <= 0) ? 'disabled' : ''; ?>>
    <input type="submit" name="submit" value="Submit Bid" <?php echo ($timeDifference <= 0) ? 'disabled' : ''; ?>>
</form>

</body>
</html>
<script>

let countdown = <?php echo $timeDifference; ?>;
function updateCountdown() {
    const countdownElement = document.getElementById("countdown");
    countdownElement.textContent = `Time Left: ${countdown} seconds`;

    if (countdown <= 0) {
        countdownElement.textContent = "Auction Ended";
        document.getElementById("JoinAuction").disabled = true;
        document.getElementById("bidForm").style.display = "none";
    } else {
        countdown--;
        setTimeout(updateCountdown, 1000); // Update the countdown every 1 second
    }
}

// Add an event listener to the Join Auction button
const joinAuctionButton = document.getElementById("JoinAuction");
joinAuctionButton.addEventListener("click", () => {
    joinAuctionButton.disabled = true; // Disable the button once the auction starts
    updateCountdown();
});

function loadBid() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("bidding").innerHTML =
                this.responseText;
        }
    };
    xhttp.open("POST", "bidding.php?player_id=<?php echo $player_id; ?>", true);
    xhttp.send();

}

setInterval(function () {
    loadBid();
    // 1sec
}, 100);

window.onload = loadBid;
</script>





