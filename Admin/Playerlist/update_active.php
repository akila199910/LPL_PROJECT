<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");


if (isset($_POST['player_id'])) {
    $player_id = $_POST['player_id'];

    $sql = "UPDATE auction SET active = 1 WHERE player_id = $player_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Update successful";
    } else {
        echo "Error updating active status: " . mysqli_error($conn);
    }
} else {
    echo "No player_id received";
}
?>
