<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
session_start();

if (isset($_SESSION['team_id'])) {
    echo $_SESSION['team_id'];
} else {
    header("Location: logout.php");
    exit; // Make sure to exit after redirect
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
        <a href="profile1.php"><input type="button" name="auction" value="Live Auction"></a>
    <a href="logout.php"><input type="button" name="logout" value="Logout"></a>
</body>
</html>
