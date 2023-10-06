<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
session_start();

if (isset($_SESSION['team_id'])) {
    echo $_SESSION['team_id'];

} else {
    header("Location: logout.php");
}
if (isset($_POST['auction'])) {
    $sql5 = "SELECT player_id FROM auction";
    $result = mysqli_query($conn, $sql5);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $player_id = $row["player_id"];
        // Redirect to the player's profile page with player_id as a query parameter
        header("Location: profile1.php?player_id=$player_id");
        exit; // Make sure to exit to stop further execution
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team dashboard</title>
</head>
<body>
    <h1>Team dashboard</h1>
    <!-- Create a form to submit the "Live Auction" request -->
    <form method="POST">
        <input type="submit" name="auction" value="Live Auction">
    </form>
    <a href="logout.php"><input type="button" name="logout" value="Logout"></a>
</body>
</html>
