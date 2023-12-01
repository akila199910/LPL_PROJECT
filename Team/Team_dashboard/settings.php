<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
session_start();

if (isset($_SESSION['team_id'])) {
   //echo $_SESSION['team_id'];
} else {
    header("Location: /LPL_PROJECT/LPL_PROJECT/Team/Team_dashboard/logout.php");
    exit; // Make sure to exit after redirect
}
?>

<!DOCTYPE html>
<html>
<head><title>Settings</title></head>
<body>

    <h1 style="text-align=center">Settings</h1>
    <ul>
        <li><a href="teamchangepwform.php">Change Your Password<a></li>
    </ul>


</body>
</html>