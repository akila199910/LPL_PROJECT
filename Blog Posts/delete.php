<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
session_start();

// Check if the delete button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
	// Get the post ID from the form
	$post_id_to_delete = $_POST['post_id'];

	//deletion query
	$sql_delete = "DELETE FROM posts WHERE post_id = $post_id_to_delete";

	// Execute deletion query & alert
	if ($conn->query($sql_delete) === TRUE) {
		echo "<script>alert('Post delete successfully!');</script>";

	} else {
		echo "<script>alert('Deleting Error!. Please check connection & Try again. ');</script>";
	}
	
}
echo '<script> window.location.href = "blog.php"</script>';
$conn->close();
?>