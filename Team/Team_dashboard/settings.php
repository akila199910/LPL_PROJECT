<?php

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
	
	border-radius: 15px;
    margin-left:300px;
}
a{
    text-decoration: none;
    color: #555;
}



.header{
    background: radial-gradient(#fff,#5960de);
    height: 500vh;
}


.navbar {
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: #4169E1;
    z-index: 1000;
    width: 100vw; 
    position: fixed; 
    top: 0; 
    left: 0; 
}


nav{
    flex: 1;
    text-align: right;
}
    .navbar {
      display: flex;
      align-items: center;
      padding: 20px;
      background-color: #4169E1;
    }

    nav {
      flex: 1;
      text-align: right;
    }

    nav ul {
      display: inline-block;
      list-style-type: none;
    }

    nav ul li {
      display: inline-block;
      margin-right: 20px;
    }

    nav ul li i {
      margin-right: 15px;

    }

    a {
      text-decoration: none;
      color: #555;
    }

    p {
      color: #fff;
      text-align: center;
    }
.card{
    width: 75%;
    max-width: 3000px;
    color: #000;
    text-align: center;
    padding: 50px 35px;
    border: 1px solid rgba(255,255,255,0.3);
    background: rgba(255,255,255,0.2);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(5px);
    margin-left: auto;
    margin-right: 75px;

}

.header{
    background: radial-gradient(#fff,#5960de);
    height: 500vh;
}

.bt{
    display: inline-block;
    background: #0096FF;
    
    padding: 8px 30px;
    margin: -40px 0;
    border-radius: 30px;
    border:none;
    transition: background 0.5s;
   
}

.bt:hover{
    background: #5960de;
}



      </style>

</head>
<div class="header">
<body>
<div class="navbar row">
      <div class="logo col-4">
        <img src="../../images/lpllogo.png" width="125px">
      </div>

      <div class="col-8" style="color: #fff; font-size:20px;"> LPL - LANKA PREMIER LEAGUE</div>
      </nav>

    </div>
    <br><br><br><br>


  <div class=setting>
    <div class=content>
    <h1 style="text-align=center">Settings</h1>
    <br>
    <ul>
        <li class="bt"><a href="teamchangepwform.php">Change Your Password</a></li>
        <br><br><br>
        <li class="bt"><a href="#">Edit Profile</a></li>
        <br><br><br>
        <li class="bt"><a href="team_dashboard.php">Profile</a></li>

    </ul>
    </div>
</div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </div>
</body>
</html>