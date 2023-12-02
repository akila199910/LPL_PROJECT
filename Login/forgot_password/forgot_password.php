<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <form action="forgot_password.php" method="post">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit" name="submit">Reset Password</button>
    </form>
</body>
</html>





<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if(isset($_POST['submit'])){
    $email = $_POST['email'];

    $sql = "SELECT * FROM register WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(32));

        $sql_update = "UPDATE register SET verification_code = '$token' WHERE email = '$email'";
        if ($conn->query($sql_update) === TRUE) {
            $reset_link = "http://localhost/LPL_PROJECT/LPL_PROJECT/Login/forgot_password/reset_password.php?token=$token";
            $subject = "Password Reset";
            $message = "Click the link below to reset your password: $reset_link";
            $headers = "From: premierleaguesrilanka@gmail.com";

            mail($email, $subject, $message, $headers);
            
           /* header("Location: reset_confirmation.php");
            exit();*/
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Email not found in the database!";
    }

    $conn->close();
}
?>
