<?php

session_start();
include "conn.php";
mysqli_select_db($conn,"lplsystem");

if (!isset($_SESSION['user_id'])) {
    header("Location: logout.php");
    exit(); // It's recommended to stop script execution after redirection
}
$player_id = $_SESSION['user_id'];
// Fetch player's name based on the ID
$sql = "SELECT first_name,last_name,profile_photo FROM register WHERE player_id = $player_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $player_name = $row['first_name']." ".$row['last_name'];
    }
} else {
    $player_name = "Unknown";
}

  $team_query = "SELECT * FROM team";
    $resultTeam = mysqli_query($conn, $team_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="sidebarstyle.css">
        <style>
          .size {
            width: 200px;
            height: 200px;
          }
          .btn-margin {
            margin-bottom: 15px;
          }
          
          .form-box {
            border: 2px solid #ccc; 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
          }

          #submit {
            margin-top: 10px;
          }

        </style>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
  LPL - LANKA PREMIER LEAGUE
</nav>  

<div class="content">
  <div class="container">
    <div class="row">
    <div class="row justify-content-center">
      <div class="col-lg-6">
      <form action="" class="form-box" method="POST" enctype="multipart/form-data">
        <p>If you already contracted with any team please fill this.</p>
        <div class="form-group col-6">
          <select name="identity" class="form-select" required>
            <option value="" disabled selected hidden>Select your team here</option>
            <?php
                    // Create while loop
                    while ($row = mysqli_fetch_assoc($resultTeam)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['team_name'] . "</option>";
                    }
                ?>
          </select>
        </div><br>
        <div class="form-group col-md-6 mb-2">
          <input type="int" id="price" name="price" placeholder="Price" class="form-control" required>
        </div>
        <div class="col-lg-6 justify-content-center">
        
          <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm" >SUBMIT</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $player_id = $_SESSION['user_id'];
    $team_id = $_POST['identity'];
    $price = $_POST['price'];

    // Select the category
    $category_query = "SELECT catogary FROM register WHERE player_id = $player_id";
    $result = mysqli_query($conn, $category_query);

    if ($row = mysqli_fetch_assoc($result)) {
        $category = $row['catogary'];

        switch ($category) {
            case 'BATSMAN':
                $update_query = "UPDATE batsman SET sold = $price, gotoauction = 0,team_id = $team_id WHERE player_batting_id = $player_id";
                break;
            case 'BOWLER':
                $update_query = "UPDATE bowler SET sold = $price, gotoauction = 0,team_id = $team_id WHERE player_bowlling_id = $player_id";
                break;
            case 'WICKETKEEPER':
                $update_query = "UPDATE wicketkeeper SET sold = $price, gotoauction = 0,team_id = $team_id WHERE player_keeping_id = $player_id";
                break;
            case 'ALLROUNDER':
                $update_query = "UPDATE allrounder SET sold = $price, gotoauction = 0,team_id = $team_id WHERE player_al_id = $player_id";
                break;
            // Add cases for other categories like WICKETKEEPER and ALLROUNDER
            default:
                // Handle if category is not found
                echo "Category not found!";
                exit();
        }

       
        mysqli_query($conn, $update_query);

       /* header("Location: player_dashboard.php");
        exit();*/
    }
    else {
        // Handle if the category retrieval fails
        echo "Failed to retrieve category!";
        exit();
    }

    }

    else {
        // Redirect if the form was not submitted properly
        /*header("Location: player_dashboard.php");
        exit();*/
    }
    ?>