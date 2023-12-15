<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the post ID from the AJAX request
    $postId = $_POST['postId'];

    // Update the likes_count in the database
    $updateSql = "UPDATE posts SET unlikes_count = unlikes_count + 1 WHERE post_id = $postId";
    $conn->query($updateSql);

    // Optionally, you can return a response to the client
    echo 'Unlikes updated successfully';

    // Close the database connection
    $conn->close();
}
?>
