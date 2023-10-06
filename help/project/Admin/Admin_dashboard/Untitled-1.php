<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$sql = "SELECT player_id FROM auction WHERE active=0";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    $player_id = $row["player_id"];
    echo "Player ID: " . $player_id . "<br>";

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

mysqli_close($conn);
?>
