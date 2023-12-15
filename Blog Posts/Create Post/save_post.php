<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
session_start();
$player_id = $_SESSION['user_id'];




// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Handle file upload
    $target_dir = "post_img/";
    $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
    move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);
    
    
    
    // Insert file information into the posts table
    $postText = $_POST["post_text"];
    $fileName = basename($_FILES["myfile"]["name"]);

    
    
    // Insert the post into the database
    $sql = "INSERT INTO posts (player_id, post_img, post_text, posted_date) VALUES ('$player_id', '$fileName', '$postText', CURDATE())";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Post create successfully!');</script>";
    } else {
        echo "<script>alert('Uploading Error!. Please check connection & Try again. ');</script>";
    }
}
echo '<script> window.location.href = "../blog.php"</script>';
// Close the database connection
$conn->close();
?>