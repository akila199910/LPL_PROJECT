<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
session_start();
$logged_player_id = $_SESSION['user_id'];

// Number of posts per page
$postsPerPage = 10;

// Get the visibility (dropdown) from the AJAX request
if (isset($_GET['visibility'])) {
    $visibility = $_GET['visibility'];

}

// Get the page number from the AJAX request
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset to fetch the next set of posts
$offset = ($currentPage - 1) * $postsPerPage;

//if user select my from dropdown
if ($visibility == 'my') {


    $sql = "SELECT post_id, player_id, post_text, posted_date, post_img, likes_count, unlikes_count 
        FROM posts 
        WHERE player_id = $logged_player_id 
        ORDER BY post_id DESC 
        LIMIT $postsPerPage OFFSET $offset";
    $result = $conn->query($sql);

} else if ($visibility == "team") {
    $sql_team = "SELECT player_batting_id, team_id 
        FROM batsman 
        WHERE player_batting_id = $logged_player_id";
    $result_team = $conn->query($sql_team);

    $logged_player_team_id = 0; // Set a default value

    if ($result_team->num_rows > 0) {
        // Output data of each row
        while ($rowbatsman = $result_team->fetch_assoc()) {
            $logged_player_team_id = $rowbatsman['team_id'];
        }
    }

    

    $sql1 = "SELECT player_batting_id AS player_id FROM batsman WHERE team_id = $logged_player_team_id
        UNION
        SELECT player_bowlling_id AS player_id FROM bowler WHERE team_id = $logged_player_team_id
        UNION
        SELECT player_al_id AS player_id FROM allrounder WHERE team_id = $logged_player_team_id
        UNION
        SELECT player_keeping_id AS player_id FROM wicketkeeper WHERE team_id = $logged_player_team_id
        GROUP BY player_id;";

    $result1 = $conn->query($sql1);


    if ($result1->num_rows > 0) {
        $team_player_ids = array(); // Initialize an array to store player IDs

        while ($row = $result1->fetch_assoc()) {
            $team_player_ids[] = $row['player_id'];
        }

        $team_player_ids_str = implode(',', $team_player_ids);

    } else {
        $team_player_ids_str = 0; //null data error corrected using default variable
    }



    $sql = "SELECT post_id, player_id, post_text, posted_date, post_img, likes_count, unlikes_count 
        FROM posts 
        WHERE player_id IN ($team_player_ids_str)
        ORDER BY post_id DESC 
        LIMIT $postsPerPage OFFSET $offset";
    $result = $conn->query($sql);

} else {
    $sql = "SELECT post_id,player_id, post_text, posted_date, post_img, likes_count, unlikes_count 
        FROM posts 
        ORDER BY post_id DESC 
        LIMIT $postsPerPage OFFSET $offset";
    $result = $conn->query($sql);

}



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
                    <div class="container">';
					
					if ($player_id == $logged_player_id){
					
					echo '<div class="postedit">
							
							<form method="post" action="delete.php">
							<button type="submit" name="delete_button" class="editbtn">❌</button>
							<input type="hidden" name="post_id" value="' . $post_id . '">
							</form>
					</div>';

					}	
                    echo '<div class="wrapper">
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

        echo '<button type="button" id="likeBtn_' . $row['post_id'] . '" onclick="likePost(' . $row['post_id'] . ')">Like <span id="likeCount_' . $row['post_id'] . '">' . $row['likes_count'] . '</span></button>
                            <button type="button" id="unlikeBtn_' . $row['post_id'] . '" onclick="unlikePost(' . $row['post_id'] . ')">Unlike <span id="unlikeCount_' . $row['post_id'] . '">' . $row['unlikes_count'] . '</span></button>
                            </form>
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