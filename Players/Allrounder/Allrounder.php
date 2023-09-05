<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

// Create batsman table if it doesn't exist
$sql4= "CREATE TABLE IF NOT EXISTS allrounder (
    player_al_id INT PRIMARY KEY,
    b_style VARCHAR(255),
    lpl_nom INT(6),
    t20_nom INT(6),
    runs INT(6),
    b_average FLOAT,
    strike_rate FLOAT,
    high_score INT(6),
    not_out INT,
    fifty INT(6),
    hundred INT(6),
    bowl_style VARCHAR(255),
    wickets INT(6),
    bowl_average FLOAT,
    economy FLOAT,
    best_bowl VARCHAR(100),
    w5 INT,
    sold INT NULL,
    base_price INT
)";

mysqli_query($conn, $sql4);

if (isset($_POST['submit'])) {
    //$player_al_id =$POST['player_al_id'];
    $b_style = $_POST['b_style'];
    $lpl_nom = $_POST['lpl_nom'];
    $t20_nom = $_POST['t20_nom'];
    $runs = $_POST['runs'];
    $b_average = $_POST['b_average'];
    $strike_rate = $_POST['strike_rate'];
    $high_score = $_POST['high_score'];
    $not_out = $_POST['not_out'];
    $hundred = $_POST['hundred'];
    $fifty = $_POST['fifty'];
    $bowl_style = $_POST['bowl_style'];
    $wickets = $_POST['wickets'];
    $bowl_average = $_POST['bowl_average'];
    $economy = $_POST['economy'];
    $best_bowl = $_POST['best_bowl'];
    $w5 = $_POST['w5'];
    $sold = $_POST['sold'];
    $base_price = $_POST['base_price'];



    // Insert player data into playersregistation table
    $sql5 = "INSERT INTO allrounder(`b_style`, `lpl_nom`, `t20_nom`, `runs`, `b_average`, `strike_rate`, `high_score`, `not_out`, `fifty`, `hundred`, `bowl_style`, `wickets`, `bowl_average`, `economy`, `best_bowl`, `w5`, `sold`, `base_price`)
     VALUES ('$b_style',' $lpl_nom','$t20_nom',' $runs','$b_averagevalue','$strike_rate',' $high_score','$not_out','$hundred',
     '$fifty','$bowl_style','$wickets','$bowl_average',' $economy',' $best_bowl','$w5','$sold','$base_price')";

    mysqli_query($conn, $sql5);
        }

        echo "Alrounder form";
        mysqli_close($conn);
echo "THIS IS FOLDER AL";

?>
     