
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>

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
        input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            display: block;
            box-sizing: border-box;
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
          <h1>Forgot Password</h1>
    <form action="forgot_password.php" method="post">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit" name="submit">Reset Password</button>
    </form>
        </div>
</body>
</html>

<?php
// Include PHPMailer autoloader or include the necessary files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

include("conn.php");
mysqli_select_db($conn, "lplsystem");

if(isset($_POST['submit'])){
    $email = $_POST['email'];

    $sql_register = "SELECT * FROM register WHERE email = '$email'";
    $result_register = $conn->query($sql_register);

    $sql_guest = "SELECT * FROM guest WHERE email = '$email'";
    $result_guest = $conn->query($sql_guest);

    if ($result_register->num_rows > 0 || $result_guest->num_rows > 0) {
        $token = bin2hex(random_bytes(32));
          // Update register table if email found there
          if ($result_register->num_rows > 0) {
            $sql_update = "UPDATE register SET verification_code = '$token' WHERE email = '$email'";
            $update_result = $conn->query($sql_update);
        }
        // Update guest table if email found there
        if ($result_guest->num_rows > 0) {
            $sql_update_guest = "UPDATE guest SET verification_code = '$token' WHERE email = '$email'";
            $update_guest_result = $conn->query($sql_update_guest);
        }

        
            $reset_link = "http://localhost/LPL_PROJECT/LPL_PROJECT/Login/forgot_password/reset_password.php?token=$token";
            $subject = "Password Reset";
            $message = "Click the link below to reset your password: $reset_link";

            // Create a PHPMailer object
            $mail = new PHPMailer(true); // Passing `true` enables exceptions

            try {
                //Server settings
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'premierleaguesrilanka@gmail.com'; // SMTP username
                $mail->Password = 'ttwqnjepczbyqzhw'; // SMTP password
                $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587; // TCP port to connect to

                //Recipients
                $mail->setFrom('premierleaguesrilanka@gmail.com');
                $mail->addAddress($email); // Add a recipient

                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body = $message;

                $mail->send();
                echo "<script>alert('Check your mailbox for password reset instructions.');</script>";
            } catch (Exception $e) {
                echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        
    } else {
        echo "Email not found in the database!";
    }

    $conn->close();
}
?>
