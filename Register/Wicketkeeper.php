<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

// Create batsman table if it doesn't exist
$sql4= "CREATE TABLE IF NOT EXISTS wicketkeeper (
    id INT PRIMARY KEY AUTO_INCREMENT,
    b_style VARCHAR(255),
    lpl_nom INT(6),
    t20_nom INT(6),
    runs INT(6),
    b_average FLOAT,
    strike_rate FLOAT,
    high_score INT(6),
    fifty INT(6),
    hundred INT(6)
)";

if (mysqli_query($conn, $sql4)) {
    echo "Wicketkeeper Table is Created";
} else {
    echo "Error Creating Table: ". mysqli_error($conn);
}

if (isset($_POST['submit'])) {
    $bat = $_POST['bat'];
    $lplnom = $_POST['lplnom'];
    $t20nom = $_POST['t20nom'];
    $run = $_POST['run'];
    $average = $_POST['average'];
    $strikerate = $_POST['strikerate'];
    $highscore = $_POST['highscore'];
    $fifty = $_POST['fifty'];
    $hundred = $_POST['hundred'];
    $submit = $_POST['submit'];

    // Insert player data into playersregistation table
    $sql5 = "INSERT INTO wicketkeeper (b_style, lpl_nom, t20_nom, runs, b_average, strike_rate, high_score, fifty, hundred) 
            VALUES ('$bat', '$lplnom', '$t20nom', '$run', '$average', '$strikerate', '$highscore', '$fifty', '$hundred')";

    if (mysqli_query($conn, $sql5)) {
        echo "Player Details Added Successfully";
    } else {
        echo "Error Adding Player Details: " . mysqli_error($conn);
    }

    
    header("Location: palyerApplicationReview.html");
    
    exit; // Make sure to exit after sending the header
}



?>
    