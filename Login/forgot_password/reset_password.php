<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $sql_check_token = "SELECT * FROM register WHERE verification_code = '$token'";
    $result = $conn->query($sql_check_token);

    if ($result->num_rows > 0) {
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Reset Password</title>

            <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
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
                <input type="hidden" name="token" value="'.$token.'">
                <input type="password" name="password" placeholder="Enter new password" required>
                <input type="password" name="confirm_password" placeholder="Confirm new password" required>
                <button type="submit" name="reset_password">Reset Password</button>
            </form>
            </div>
        </body>
        </html>
        ';
    } else {
        echo "Invalid or expired token!";
    }
}

$conn->close();
?>
