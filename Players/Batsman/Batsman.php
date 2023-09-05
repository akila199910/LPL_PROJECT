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

if (isset($_GET['player_id'])) {
    $player_id = $_GET['player_id'];
} 

if (isset($_POST['submit'])) {
    $player_batting_id=$player_id;
    $b_style = $_POST['b_style'];
    $lpl_nom = $_POST['lpl_nom'];
    $t20_nom = $_POST['t20_nom'];
    $runs = $_POST['runs'];
    $b_average = $_POST['b_average'];
    $strike_rate= $_POST['strike_rate'];
    $high_score = $_POST['high_score'];
    $not_out = $_POST['not_out'];
    $fifty = $_POST['fifty'];
    $hundred = $_POST['hundred'];
    //$sold = $_POST['sold'];
    $based_price = $_POST['based_price'];

     $sql5 = "INSERT INTO batsman(`player_batting_id`,`b_style`, `lpl_nom`, `t20_nom`, `runs`, `b_average`, `strike_rate`, `high_score`, `not_out`, `fifty`, `hundred`, `based_price`) VALUES 
    ('$player_batting_id','$b_style','$lpl_nom','$t20_nom','$runs','$b_average','$strike_rate','$high_score','$not_out','$fifty','$hundred','$based_price')";
    
    mysqli_query($conn, $sql5);
    header("Location: /Moderator/ReviewPage.php");

    }
mysqli_close($conn);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Batsman</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
        LPL - LANKA PREMIER LEAGUE
    </nav>
    

    <div class="container mt-4">
        <h2>Add Batsman Information</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="b_style" class="form-label">Batting Style</label>
                <select class="form-select" id="b_style" name="b_style" required>
                    <option disabled selected hidden=""></option>
                    <option value="Right Hand">Right Hand</option>
                    <option value="Left Hand">Left Hand</option>

                </select>
            </div>



            <div class="mb-3">
                <label for="lpl_nom" class="form-label"> No  Of LPL Match</label>
                <input type="number" class="form-control" id="lpl_nom" name="lpl_nom" required>
            </div>
            <div class="mb-3">
                <label for="t20_nom" class="form-label"> No Of T20 Match</label>
                <input type="number" class="form-control" id="t20_nom" name="t20_nom" required>
            </div>
            <div class="mb-3">
                <label for="runs" class="form-label">Runs</label>
                <input type="number" class="form-control" id="runs" name="runs" required>
            </div>
            <div class="mb-3">
                <label for="b_average" class="form-label">Batting Average</label>
                <input type="number" step="0.01" class="form-control" id="b_average" name="b_average" required>
            </div>

            <div class="mb-3">
                <label for="strike_rate" class="form-label">Strike Rate</label>
                <input type="number" step="0.01" class="form-control" id="strike_rate" name="strike_rate" required>
            </div>

            <div class="mb-3">
                <label for="high_score" class="form-label">High Score</label>
                <input type="number" class="form-control" id="high_score" name="high_score" required>
            </div>
            <div class="mb-3">
                <label for="not_out" class="form-label">Not Out</label>
                <input type="number" class="form-control" id="not_out" name="not_out" required>
            </div>
            <div class="mb-3">
                <label for="fifty" class="form-label">Fifty</label>
                <input type="number" class="form-control" id="fifty" name="fifty" required>
            </div>
            <div class="mb-3">
                <label for="hundred" class="form-label">Hundred</label>
                <input type="number" class="form-control" id="hundred" name="hundred" required>
            </div>
            
            <div class="mb-3">
                <label for="based_price" class="form-label">Base Price</label>
                <input type="number" class="form-control" id="based_price" name="based_price" required>
            </div>
            <div class="mb-3">
                <label for="strike_rate" class="form-label">Strike Rate</label>
                <input type="number" step="0.01" class="form-control" id="strike_rate" name="strike_rate" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
    