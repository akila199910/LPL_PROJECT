<?php
include("navbar.php");
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
<head><title>Settings</title>
<style>
.setting{
    
   
	justify-content: center;
	align-items: center;
    margin:80px 20px 20px 150px;

	height: 100vh;
	flex-direction: column;
}

.content{
    width: 500px;
	border: 2px solid #ccc;
	padding: 30px;
	background:#fff;
	border-radius: 15px;
}

</style>

</head>
<body>
<div class=setting>
    <div class=content>
    <h1 style="text-align=center">Settings</h1>
    <ul>
        <li><a href="teamchangepwform.php">Change Your Password</a></li>
        <li><a href="#">Edit Profile</a></li>
        <li><a href="team_dashboard.php">Profile</a></li>

    </ul>
    </div>
</div>
</body>
</html>