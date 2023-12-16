<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
session_start();
$logged_player_id = $_SESSION['user_id'];

// Number of posts per page
$postsPerPage = 10;


// Get the page number from the AJAX request
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset to fetch the next set of posts
$offset = ($currentPage - 1) * $postsPerPage;


    $sql = "SELECT post_id,player_id, post_text, posted_date, post_img, likes_count, unlikes_count 
        FROM posts 
        ORDER BY post_id DESC 
        LIMIT $postsPerPage OFFSET $offset";
    $result = $conn->query($sql);




// Display initial blog posts
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // get register table data
        $player_id = $row['player_id'];
        $post_id = $row['post_id'];


        $register_sql = "SELECT * FROM register WHERE player_id = $player_id";
        $register_result = $conn->query($register_sql);
        $row1 = $register_result->fetch_assoc();


        echo '<div class="post">
                    <div class="container">
                        <div class="wrapper">
                            <form>
                            <div class="content">
                                <div class="profile-picture">
                                        <img src="../Register/Img/proimg/' . htmlspecialchars($row1['profile_photo']) . '" alt="Post Image" class="post-img" loading="lazy">   
                                </div>
                                <div class="details">
                                        <h4><b>' . htmlspecialchars($row1['first_name']) . ' ' . htmlspecialchars($row1['last_name']) . '</b></h4>
                                        <h7>Posted on ' . date('F j, Y', strtotime($row['posted_date'])) . '</h7>
                                </div>
                            </div>
                                <div class="post-img-txt">
                                        <p>' . htmlspecialchars($row['post_text']) . '</p>
                                </div>';


        // Display the post image if available with lazy loading
        if (!empty($row['post_img'])) {
            echo '
                                <div class="options">
                                    <img src="Create Post/post_img/' . htmlspecialchars($row['post_img']) . '" alt="Post Image" class="post-img-txt" loading="lazy">
                                </div>';
        }

        echo '<center><button class="heartbtn" type="button" id="likeBtn_' . $row['post_id'] . '" onclick="likePost(' . $row['post_id'] . ')">
				
				<img src="icons/Heart_icon.png" alt="" width="60px" height="60px">
				
				<span class="heartcount" id="likeCount_' . $row['post_id'] . '">' . $row['likes_count'] . '</span></button>
                        </div>
                    </div>
                </div>';


    }
} else {
    //echo 'no-more-posts'; // Signal that there are no more posts to load
}

// Close the database connection
$conn->close();
?>