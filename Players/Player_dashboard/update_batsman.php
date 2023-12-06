<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: logout.php");
    exit(); 
}

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
                $update_query = "UPDATE bowler SET sold = $price, gotoauction = 0,team_id = $team_id WHERE player_bowling_id = $player_id";
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

        // Perform the update query for the respective category
        mysqli_query($conn, $update_query);

        // Redirect back to the player_dashboard.php or any other page
        header("Location: player_dashboard.php");
        exit();
    }
    else {
        // Handle if the category retrieval fails
        echo "Failed to retrieve category!";
        exit();
    }

    }

    else {
        // Redirect if the form was not submitted properly
        header("Location: player_dashboard.php");
        exit();
    }
    
?>
