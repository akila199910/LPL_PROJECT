<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$password = 1234;
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the bid table
$sql = "INSERT INTO admin (first_name, last_name, email, password, profile_picture) 
VALUES 
    ('Admin', 'test', 'admin@gmail.com', '$hashed_password', 'admin.jpg')";

if (mysqli_multi_query($conn, $sql)) {
    echo "Data Inserted Successfully";
} else {
    echo "Error Inserting Data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
