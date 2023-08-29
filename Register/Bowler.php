

    <?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

// Create bowler table if it doesn't exist
$sqlbowler= "CREATE TABLE IF NOT EXISTS bowler (
    id INT PRIMARY KEY AUTO_INCREMENT,
    bowl_style VARCHAR(255),
    num_match INT(6),
    wickets INT(6),
    bowl_average FLOAT,
    economy FLOAT,
    best_bowl VARCHAR(100)
)";

if (mysqli_query($conn, $sqlbowler)) {
    echo "Bowler Table is Created";
} else {
    echo "Error Creating Table: ". mysqli_error($conn);
}

if (isset($_POST['submit'])) {
    $bowl = $_POST['Style'];
    $nom = $_POST['nom'];
    $wicket = $_POST['wicket'];
    $baverage = $_POST['baverage'];
    $economy = $_POST['economy'];
    $bestbowld = $_POST['bestbowld'];
    $submit = $_POST['submit'];

    // Insert player data into playersregistation table
    $sqlbowlervalues = "INSERT INTO bowler (bowl_style, num_match, wickets,bowl_average, economy, best_bowl) 
            VALUES ('$bowl', '$nom','$wicket', '$baverage', '$economy', '$bestbowld')";

    if (mysqli_query($conn, $sqlbowlervalues)) {
        echo "Player Details Added Successfully";
    } else {
        echo "Error Adding Player Details: " . mysqli_error($conn);
    }

    
    header("Location: palyerApplicationReview.html");
    
    exit; // Make sure to exit after sending the header
}



?>
