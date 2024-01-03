<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $sql_check_token_register = "SELECT * FROM register WHERE verification_code = '$token'";
    $result_register = $conn->query($sql_check_token_register);

    $sql_check_token_guest = "SELECT * FROM guest WHERE verification_code = '$token'";
    $result_guest = $conn->query($sql_check_token_guest);


    if ($result_register->num_rows > 0 || $result_guest->num_rows > 0) {
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Reset Password</title>

            <style>
            body {
                font-family: Arial, sans-serif;
                background: radial-gradient(#fff,#5960de);
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 400px;
                margin: 100px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                text-align: center;
            }
            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
            button[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 3px;
                cursor: pointer;
            }
            button[type="submit"]:hover {
                background-color: #0056b3;
            }
        </style>
        
   


        </head>
        <body>
        <div class="container">
        <h1>Reset Password</h1>
            <form action="password_reset_handler.php" method="post">
                <input type="hidden" name="token" value="' . $token . '">
                <input type="password" name="password"  id="password" placeholder="Enter new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onkeyup="checkPasswordMatch()">
                <span id="passwordMatchError" style="color: red;"></span>
                <br><br>
                <button type="submit" name="reset_password">Reset Password</button>
            </form>
            <script>
            function checkPasswordMatch() {
                var password = document.getElementById("password").value;
                var confirmPassword = document.getElementById("confirmPassword").value;
        
                if (password !== confirmPassword) {
                    document.getElementById("passwordMatchError").innerHTML = "Passwords do not match";
                    submitButton.disabled = true;
                } else {
                    document.getElementById("passwordMatchError").innerHTML = "";
                    submitButton.disabled = false;
        
                }
            }
        
        
        
            
        </script>
        
            </div>
        </body>
        </html>
        ';
    } else {
        echo "Invalid or expired token!";
    }
}

$conn->close();
