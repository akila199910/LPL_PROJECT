<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

// Create bowler table if it doesn't exist
$sql6= "CREATE TABLE IF NOT EXISTS bowler (
    player_bowlling_id INT PRIMARY KEY,
    bowl_style VARCHAR(255),
    lpl_nom INT(6),
    t20_nom INT(6),
    wickets INT(6),
    bowl_average FLOAT,
    economy FLOAT,
    best_bowl VARCHAR(100),
    w5 INT,
    sold INT NULL,
    besed_price INT 
)";

mysqli_query($conn, $sql6);


if (isset($_POST['submit'])) {
    $bowl_style = $_POST['bowl_style'];
    $lpl_nom = $_POST['lpl_nom'];
    $t20_nom = $_POST['t20_nom'];
    $wickets = $_POST['wickets'];
    $bowl_average = $_POST['bowl_average'];
    $economy = $_POST['economy'];
    $best_bowl = $_POST['best_bowl'];
    $w5 = $_POST['w5'];
    $sold = $_POST['sold'];
    $besed_price=$_POST['besed_price'];
    $submit=$_POST['submit'];

    
    $sql7="INSERT INTO `bowler`(`bowl_style`, `lpl_nom`, `t20_nom`, `wickets`, `bowl_average`, `economy`, `best_bowl`, `w5`, `sold`, `besed_price`) VALUES
     ('$bowl_style','$lpl_nom','$t20_nom','$wickets','$bowl_average','$economy','$best_bowl','$w5','$sold','$besed_price')";
    mysqli_query($conn, $sql7);
}


echo "THIS IS FOLDER Bowler form";
mysqli_close($conn);


?>
