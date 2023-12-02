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
        </head>
        <body>
            <form action="password_reset_handler.php" method="post">
                <input type="hidden" name="token" value="'.$token.'">
                <input type="password" name="password" placeholder="Enter new password" required>
                <input type="password" name="confirm_password" placeholder="Confirm new password" required>
                <button type="submit" name="reset_password">Reset Password</button>
            </form>
        </body>
        </html>
        ';
    } else {
        echo "Invalid or expired token!";
    }
}

$conn->close();
?>
