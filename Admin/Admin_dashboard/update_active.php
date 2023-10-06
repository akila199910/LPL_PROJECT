<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_POST['player_id'])) {
    $player_id = $_POST['player_id'];
    
    // Update the active status
    $update = "UPDATE auction SET active = 1 WHERE player_id = $player_id";
    mysqli_query($conn, $update);
    
    // You can add additional logic or error handling if needed
}
?>
