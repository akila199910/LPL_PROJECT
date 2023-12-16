<?php
include("navbar.php");
include("conn.php");
mysqli_select_db($conn, "lplsystem");
session_start();

if (isset($_SESSION['team_id'])) {
   //echo $_SESSION['team_id'];
} else {
    header("Location: logout.php");
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
a{
    text-decoration: none;
    color: #555;
}

p{
    color: #fff;
    text-align:center;
}

.header{
    background: radial-gradient(#fff,#5960de);
    height: 500vh;
}
      </style>

</head>
<body>
<div class="content">
  <div class="container">
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
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </div>
</body>
</html>