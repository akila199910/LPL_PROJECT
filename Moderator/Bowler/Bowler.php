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
if (isset($_GET['player_id'])) {
    $player_id = $_GET['player_id'];
} 
if (isset($_POST['submit'])) {
    $player_bowlling_id=$player_id;
    $bowl_style = $_POST['bowl_style'];
    $lpl_nom = $_POST['lpl_nom'];
    $t20_nom = $_POST['t20_nom'];
    $wickets = $_POST['wickets'];
    $bowl_average = $_POST['bowl_average'];
    $economy = $_POST['economy'];
    $best_bowl = $_POST['best_bowl'];
    $w5 = $_POST['w5'];
    //$sold = $_POST['sold'];
    $besed_price=$_POST['besed_price'];
    $submit=$_POST['submit'];

    
    $sql7="INSERT INTO bowler(`player_bowlling_id`,`bowl_style`, `lpl_nom`, `t20_nom`, `wickets`, `bowl_average`, `economy`, `best_bowl`, `w5`, `besed_price`) VALUES
     ('$player_bowlling_id','$bowl_style','$lpl_nom','$t20_nom','$wickets','$bowl_average','$economy','$best_bowl','$w5','$besed_price')";
    mysqli_query($conn, $sql7);
    header("Location: ../ReviewPage.php");

}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>Bowler</title>
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

.header{
    background: radial-gradient(#fff,#5960de);
}


.card{
    width: 95%;
    max-width: 3000px;
    color: #fff;
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
  
.bt{
    display: inline-block;
    background: #0096FF;
    
    padding: 8px 30px;
    margin: -40px 0;
    border-radius: 30px;
    border:none;
    transition: background 0.5s;
}

.bt:hover{
    background: #5960de;
}
    </style>
</head>

<div class="header">
<body>
<div class="navbar">
        <div class="logo">
           <a href="home.php"><img src="../../images/lpllogo.png" width="125px"></a>
        </div>
        
        <nav>
            <ul>
                <li><i class="fa-solid fa-laptop"></i><a href="">Dashboard</a></li>
                <li><i class="fa-solid fa-right-from-bracket"></i><a href="about.php">Log Out</a></li>
                
            </ul>
        </nav>
       
    </div>
    <br><br><br><br>
    <div class="card" data-tilt>

    <div class="container mt-4">
        <h2>Add Bowler Information</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="bowl_style" class="form-label">Bowl Style</label>

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
            <label for="lpl_nom" class="form-label"> No Of LPL Match</label>
            <input type="number" class="form-control" id="lpl_nom" name="lpl_nom" required>
        </div>
        <div class="mb-3">
            <label for="t20_nom" class="form-label">No Of T20 Match</label>
            <input type="number" class="form-control" id="t20_nom" name="t20_nom" required>
        </div>
        <div class="mb-3">
            <label for="wickets" class="form-label">Wickets</label>
            <input type="number" class="form-control" id="wickets" name="wickets" required>
        </div>
        <div class="mb-3">
            <label for="bowl_average" class="form-label">Bowling Average</label>
            <input type="number" step="0.01" class="form-control" id="bowl_average" name="bowl_average" required>
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
            <label for="w5" class="form-label">5-Wicket Hauls</label>
            <input type="number" class="form-control" id="w5" name="w5" required>
        </div>
    
        <div class="mb-3">
            <label for="besed_price" class="form-label">Base Price</label>
            <input type="number" class="form-control" id="besed_price" name="besed_price" required>
        </div>
        <br><br>
        <button type="submit" name="submit" class="bt">Submit</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>
