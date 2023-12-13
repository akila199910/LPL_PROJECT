

<?php
include("navbar.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to your MySQL database (replace with your database credentials).
    include("conn.php");

mysqli_select_db($conn, "lplsystem");

    // Get user inputs
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate user's old password (Replace with your own logic)
    $Team_Id = $_SESSION['team_id']; // Assuming you have a user session.

    // Verify old password before changing it.
    $sql = "SELECT password FROM team WHERE id = $Team_Id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0 && $newPassword==$confirmPassword) {
        $row = $result->fetch_assoc();
        if (password_verify($oldPassword, $row['password'])) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
            // Update the user's password
            $updateSql = "UPDATE team SET password = '$hashedPassword' WHERE id = $Team_Id";
            if ($conn->query($updateSql) === TRUE) {
                echo '<script>alert("Password changed successfully!");'; 
                echo 'window.location.href="logout.php";</script>';
                
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo '<script>alert("Invalid old password.");';
            echo 'window.location.href="teamchangepwform.php";</script>';
        }
    } else {
        echo '<script>alert("New and Confirm password not match!!");';
        echo 'window.location.href="teamchangepwform.php";</script>';
    }


    // Close the database connection
    $conn->close();
}
?>

   
