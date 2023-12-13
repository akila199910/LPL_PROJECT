<?php
include("navbar.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
   <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
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
