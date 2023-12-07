<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {

    if (isset($_POST['teamSelect'])) {
        $teamId = $_POST['teamSelect'];
    
        $sql = "SELECT player_batting_id AS player_id
                FROM batsman
                WHERE team_id = $teamId
    
                UNION
    
                SELECT player_bowlling_id AS player_id
                FROM bowler
                WHERE team_id =  $teamId
    
                UNION
    
                SELECT player_keeping_id AS player_id
                FROM wicketkeeper
                WHERE team_id =  $teamId
    
                UNION
    
                SELECT player_al_id AS player_id
                FROM allrounder
                WHERE team_id =  $teamId";
    
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
    }
    





} else {
    header("Location: /LPL_PROJECT/LPL_PROJECT/Admin/logout.php");
}


?>
