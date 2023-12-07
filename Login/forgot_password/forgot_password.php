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
            echo "<script>alert('Check your mail box');</script>";
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
