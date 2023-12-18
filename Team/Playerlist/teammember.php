<?php
include "conn.php";
mysqli_select_db($conn, "lplsystem");

// Auto logout without session
session_start();
$team_id =$_SESSION['team_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Team Players</title>
    
</head>
<div class="header">

<body>
    <div id="sidebar"> 
<?php
include('sidebar.php');
?></div>
<div class="navbar row">
        <div class="logo col-4" >
           <img src="../../images/lpllogo.png" width="125px"> 
        </div>

        <div class="col-8" style="color: #fff; font-size:20px;">   LPL - LANKA PREMIER LEAGUE</div>
        </nav>
       
    </div>
    <br><br><br><br>
<div class="content">
    <div class="container">
        <?php
        include("conn.php");
        mysqli_select_db($conn, "lplsystem");

        $sql = "SELECT * FROM team";
        $result = mysqli_query($conn, $sql);
       
        
        $sql = "SELECT player_batting_id AS player_id
                FROM batsman
                WHERE team_id = $team_id
    
                UNION
    
                SELECT player_bowlling_id AS player_id
                FROM bowler
                WHERE team_id =  $team_id
    
                UNION
    
                SELECT player_keeping_id AS player_id
                FROM wicketkeeper
                WHERE team_id =  $team_id
    
                UNION
    
                SELECT player_al_id AS player_id
                FROM allrounder
                WHERE team_id =  $team_id";
    
        $result = mysqli_query($conn, $sql);
        $counter = 0; // Initialize a counter to keep track of players in the row

        while ($row = mysqli_fetch_assoc($result)) {
            $player_id = $row['player_id'];
    
            $sql1 = "SELECT profile_photo, catogary, first_name, last_name FROM register WHERE player_id=$player_id";
            $resultId = mysqli_query($conn, $sql1);
    
            while ($row1 = mysqli_fetch_assoc($resultId)) {
                
                if ($counter % 4 == 0) {
                    echo '<div class="row">';
                }
    
                echo '<div class="col-md-3">'; 
                echo '<img src="../../Register/Img/proimg/' . $row1['profile_photo'] . '" alt="Profile Picture" class="profile-img"><br>';
                echo $row1['catogary'] . "<br>";
                echo $row1['first_name'] . " " . $row1['last_name'];
                echo "</div>";
    
                $counter++;
    
                // Close the row div after every 4 players
                if ($counter % 4 == 0) {
                    echo '</div>';
                }
            }
        }
    
        // Close the row div if the number of players is not a multiple of 4
        if ($counter % 4 != 0) {
            echo '</div>';
        }
    
        $counter = 0;
        ?>
    </div>
    <br>
    
</div>

</body>
</html>