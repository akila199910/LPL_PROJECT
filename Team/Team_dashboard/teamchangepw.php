<?php
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

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($oldPassword, $row['password'])) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
            // Update the user's password
            $updateSql = "UPDATE team SET password = '$hashedPassword' WHERE id = $Team_Id";
            if ($conn->query($updateSql) === TRUE) {
                echo "Password changed successfully!";
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "Invalid old password.";
        }
    } else {
        echo "User not found.";
    }


    // Close the database connection
    $conn->close();
}
?>
<html><head>
    <body>
    <p>    
    <a href="team_dashboard.php"><button>PROFILE</button></a>
    <a href="teamchangepwform.php"><button>BACK</button></a></p></body>
</head></html>
