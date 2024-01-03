User
<?php
include("conn.php");
mysqli_select_db($conn, "id21734038_lpl");

if(isset($_POST['reset_password'])){
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password === $confirm_password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql_reset_password_register = "UPDATE register SET password = '$hashed_password', verification_code = NULL WHERE verification_code = '$token'";
        $result_register = $conn->query($sql_reset_password_register);
        
        else
        // Update password in the guest table if verification code matches
        $sql_reset_password_guest = "UPDATE guest SET password = '$hashed_password', verification_code = NULL WHERE verification_code = '$token'";
        $result_guest = $conn->query($sql_reset_password_guest);
        
        if (($result_register === TRUE) || ($result_guest === TRUE)) {
            echo "<script>alert('password reset success');</script>";   
            echo '<script> window.location.href = "../../loginform.php"</script>';
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