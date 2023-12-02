<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if(isset($_POST['reset_password'])){
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password === $confirm_password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql_reset_password = "UPDATE register SET password = '$hashed_password', verification_code = NULL WHERE verification_code = '$token'";
        if ($conn->query($sql_reset_password) === TRUE) {
            echo "reset_success";
            exit();
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Passwords do not match!";
    }
}

$conn->close();
?>
