

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
   <link rel="stylesheet" type="text/css" href="style.css" />
   <style>
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
    <div class=bg>

    <h2>Change Password</h2>
    <form id="passwordForm" action="teamchangepw.php" method="post">
        <table>
        <tr><td><label for="oldPassword">Old Password:</label></td>
        <td><input type="password" name="oldPassword" placeholder="old Password" required></td></tr>
        
        <tr><td><label for="newPassword">New Password:</label></td>
        <td><input type="password" name="newPassword" placeholder="new Password" required></td></tr>
        
        <tr><td><label for="confirmPassword">Confirm Password:</label></td>
        <td><input type="password" name="confirmPassword" placeholder="confirm Password" required></td></tr>
        
        <span id="error" style="color: red;"></span><br><br>
        
        <tr><td><button type="submit" value="Change Password">Change Password</button></td>
            </tr>
        
        </table>
    </form>
   <a href="settings.php" >Cancel</a>
</div>

    <script>
        document.getElementById("passwordForm").addEventListener("submit", function (e) {
            var newPassword = document.getElementById("newPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (newPassword !== confirmPassword) {
                e.preventDefault();
                document.getElementById("error").innerText = "New password and confirm password do not match.";
            }
        });
    </script>
</body>
</html>
