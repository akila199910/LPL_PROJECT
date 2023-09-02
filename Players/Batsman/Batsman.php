<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

// Create batsman table if it doesn't exist
$sql4= "CREATE TABLE IF NOT EXISTS batsman (
    player_batting_id INT PRIMARY KEY,
    b_style VARCHAR(255),
    lpl_nom INT(6),
    t20_nom INT(6),
    runs INT(6),
    b_average FLOAT,
    strike_rate FLOAT,
    high_score INT(6),
    not_out int(6),
    fifty INT(6),
    hundred INT(6),
    sold INT NULL,
    based_price INT
)";

mysqli_query($conn, $sql4);

if (isset($_POST['submit'])) {
    $b_style = $_POST['b_style'];
    $lpl_nom = $_POST['lpl_nom'];
    $t20_nom = $_POST['t20_nom'];
    $runs = $_POST['runs'];
    $b_average = $_POST['b_average'];
    $high_score = $_POST['high_score'];
    $not_out = $_POST['not_out'];
    $fifty = $_POST['fifty'];
    $hundred = $_POST['hundred'];
    $sold = $_POST['sold'];
    $based_price = $_POST['based_price'];

     $sql5 = "INSERT INTO (`b_style`, `lpl_nom`, `t20_nom`, `runs`, `b_average`, `strike_rate`, `high_score`, `not_out`, `fifty`, `hundred`, `sold`, `based_price`) VALUES 
    ('$b_style','$lpl_nom','$t20_nom','$runs','$b_average','$strike_rate','$high_score','$not_out','$fifty','$hundred','$sold','$based_price')";
    
    mysqli_query($conn, $sql5);
    }
echo "THIS IS Batsman form FOLDER";


mysqli_close($conn);

?>
    