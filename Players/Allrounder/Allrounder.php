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

if (isset($_GET['player_id'])) {
    $player_id = $_GET['player_id'];
}

if (isset($_POST['submit'])) {
    $player_al_id =$player_id;
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
    //$sold = $_POST['sold'];
    $base_price = $_POST['base_price'];



    // Insert player data into playersregistation table
    $sql5 = "INSERT INTO allrounder(`player_al_id`,`b_style`, `lpl_nom`, `t20_nom`, `runs`, `b_average`, `strike_rate`, `high_score`, `not_out`, `fifty`, `hundred`, `bowl_style`, `wickets`, `bowl_average`, `economy`, `best_bowl`, `w5`, `base_price`)
     VALUES ('$player_id','$b_style',' $lpl_nom','$t20_nom',' $runs','$b_average','$strike_rate',' $high_score','$not_out','$hundred',
     '$fifty','$bowl_style','$wickets','$bowl_average',' $economy',' $best_bowl','$w5','$base_price')";

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
        <title>Allrounder</title>
        <style>
        body,h1 {font-family: "Raleway", sans-serif}
    body, html {height: 100%}
    .bgimg {
    background-color: #0a50a1;
    min-height: 100%;
    background-position: center;
    background-size: cover;

    .w3-sidebar {width: 120px;background: #222;}
    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {margin-left: 300px; margin-right:300px}
    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {#main {margin-left: 0}}
    }
    </style>
     </head>
     <body>
     <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Allrounder</title>
   
</head>

<body>
    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <div class="w3-display-topleft w3-padding-large w3-xlarge">
    <img src="1.png" width=300px; height=140px;>
    </div>

    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
        LPL - LANKA PREMIER LEAGUE
    </nav>

    <div class="container mt-4">
        <div class="container mt-4">
            <h2 align="center">Add Allrounder Information</h2>
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
                    <label for="lpl_nom" class="form-label"> No Of LPL Match</label>
                    <input type="number" class="form-control" id="lpl_nom" name="lpl_nom" required>
                </div>
                <div class="mb-3">
                    <label for="t20_nom" class="form-label">No Of T20 Match</label>
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
                    <label for="bowl_style" class="form-label">Bowling Style</label>
    
                    <select class="form-select" id="bowl_style" name="bowl_style" required>
                        <option disabled selected hidden=""></option>
                        <option value="Right Arm Fast Bowler">Right Arm Fast Bowler</option>
                        <option value="Left Arm Fast Bowler">Left Arm Fast Bowler</option>
                        <option value="Right Arm Medium Fast Bowler">Right Arm Medium Fast Bowler</option>
                        <option value="Left Arm Medium Fast Bowler">Left Arm Medium Fast Bowler</option>
                        <option value="Right Arm Off Break">Right Arm Off Break</option>
                        <option value="Right Arm Leg Break">Right Arm Leg Break</option>
                        <option value="Rigth Arm Leg Break Googly">Rigth Arm Leg Break Googly</option>
                        <option value="Left Arm Orthodox Sprinner">Left Arm Orthodox Sprinner</option>
                        <option value="Left Arm Leg Sprinner">Left Arm Leg Sprinner</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="wickets" class="form-label">Wickets</label>
                    <input type="number" class="form-control" id="wickets" name="wickets" required>
                </div>
                <div class="mb-3">
                    <label for="bowl_average" class="form-label">Bowling Average</label>
                    <input type="number" step="0.01" class="form-control" id="bowl_average" name="bowl_average"
                        required>
                </div>
                <div class="mb-3">
                    <label for="economy" class="form-label">Economy</label>
                    <input type="number" step="0.01" class="form-control" id="economy" name="economy" required>
                </div>
                <div class="mb-3">
                    <label for="best_bowl" class="form-label">Best Bowl</label>
                    <input type="text" class="form-control" id="best_bowl" name="best_bowl" required>
                </div>
                <div class="mb-3">
                    <label for="w5" class="form-label">Five-Wicket Hauls</label>
                    <input type="number" class="form-control" id="w5" name="w5" required>
                </div>
            
                <div class="mb-3">
                    <label for="base_price" class="form-label">Base Price</label>
                    <input type="number" class="form-control" id="base_price" name="base_price" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
     </body>
     </html>