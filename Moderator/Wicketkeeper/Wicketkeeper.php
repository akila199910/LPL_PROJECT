<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

// Create batsman table if it doesn't exist
$sql4= "CREATE TABLE IF NOT EXISTS wicketkeeper (
    player_keeping_id INT PRIMARY KEY,
    b_style VARCHAR(255),
    lpl_nom INT(6),
    t20_nom INT(6),
    runs INT(6),
    b_average FLOAT,
    strike_rate FLOAT,
    high_score INT(6),
    not_out int(6),
    stumps INT(6),
    catch INT(6),
    sold INT NULL,
    based_price INT
)";

mysqli_query($conn, $sql4);

// Retrieve player_id from the URL
if (isset($_GET['player_id'])) {
    $player_id = $_GET['player_id'];
} 

if (isset($_POST['submit'])) {
   $player_keeping_id =$player_id;
    $b_style = $_POST['b_style'];
    $lpl_nom = $_POST['lpl_nom'];
    $t20_nom = $_POST['t20_nom'];
    $runs = $_POST['runs'];
    $b_average = $_POST['b_average'];
    $high_score = $_POST['high_score'];
    $not_out = $_POST['not_out'];
    $stumps = $_POST['stumps'];
    $catch = $_POST['catch'];
   // $sold = $_POST['sold'];
    $based_price = $_POST['based_price'];
    $strike_rate=$_POST['strike_rate'];


     $sql5 = "INSERT INTO wicketkeeper(`player_keeping_id`,`b_style`, `lpl_nom`, `t20_nom`, `runs`, `b_average`, `strike_rate`, `high_score`, `not_out`, `stumps`, `catch`, `based_price`) VALUES 
     ('$player_keeping_id','$b_style','$lpl_nom','$t20_nom','$runs','$b_average','$strike_rate','$high_score','$not_out','$stumps','$catch','$based_price')";

    mysqli_query($conn, $sql5);  
    header("Location: /LPL_PROJECT/LPL_PROJECT/Moderator/ReviewPage.php");
} 
mysqli_close($conn);



?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Wicketkeeper</title>

    <style>
        body {
            background: radial-gradient(#fff,#5960de);
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background: #b3b4cd;
        }
        .form-control {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card{
    width: 95%;
    max-width: 3000px;
    color: #000;
    text-align: center;
    padding: 50px 35px;
    border: 1px solid rgba(255,255,255,0.3);
    background: rgba(255,255,255,0.2);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(5px);
    margin-left: auto;
    margin-right: auto;

}

.btn{
    display: inline-block;
    background: #ff523b;
    
    padding: 8px 30px;
    margin: -40px 0;
    border-radius: 30px;
    transition: background 0.5s;
}

.btn:hover{
    background: #5960de;
}

.navbar {
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: #4169E1;
    z-index: 1000;
    width: 100vw; 
    position: fixed; 
    top: 0; 
    left: 0; 
}


nav{
    flex: 1;
    text-align: right;
}

nav ul{
    display: inline-block;
    list-style-type: none;
}

nav ul li{
    display: inline-block;
    margin-right: 20px;
}

nav ul li i{
    margin-right: 15px;

}

a{
    text-decoration: none;
    color: #555;
}

    </style>
</head>
<body>
<div class="navbar row">
        <div class="logo col-4" >
           <img src="../../images/lpllogo.png" width="125px"> 
        </div>

        <div class="col-8" style="color: #fff; font-size:20px;">   LPL - LANKA PREMIER LEAGUE</div>
        </nav>
       
    </div>
    <br><br><br><br><br><br>
   <div class="card" data-tilt>

<div class="container mt-4">
    <h2>Add Wicketkeeper Information</h2>
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
            <label for="lpl_nom" class="form-label">No Of LPL Match</label>
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
            <label for="stumps" class="form-label">Stumpings</label>
            <input type="number" class="form-control" id="stumps" name="stumps" required>
        </div>
        <div class="mb-3">
            <label for="catch" class="form-label">Catches</label>
            <input type="number" class="form-control" id="catch" name="catch" required>
        </div>
        
        <div class="mb-3">
            <label for="based_price" class="form-label">Base Price</label>
            <input type="number" class="form-control" id="based_price" name="based_price" required>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
