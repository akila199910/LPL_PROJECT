<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
session_start();
$logged_player_id = $_SESSION['user_id'];

$posts_visibility = isset($_POST['posts_visibility']) ? $_POST['posts_visibility'] : 'all'; // Set a default value if not provided

?>


<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<meta http-equiv="refresh" content="1">-->
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>LpL Posts</title>
	<style>
		.profile-picture {
			width: 60px;
			height: 60px;
			border-radius: 50%;
			overflow: hidden;
			/* Hide the overflowing parts of the image */
		}

		.profile-picture img {
			width: 100%;
			height: 100%;
			display: block;
			/* Remove extra space below the image */
		}

		h1 {
			color: #333;
		}

		.post {
			margin-bottom: 40px;
		}

		.post-img-txt {
			max-width: 100%;
			width: 930px;
			height: auto;
		}

		/* Import Google Font - Poppins */
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}


		.container {

			max-width: 100%;
			width: 1000px;
			overflow: hidden;
			background: #fff;
			border-radius: 10px;
			transition: height 0.2s ease;
			box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
		}

		.container .wrapper {
			flex-wrap: wrap;
			/* Allow flex items to wrap to the next line on smaller screens */
		}


		.container .wrapper section {
			width: 100%;
			/* Make posts take full width on smaller screens */
			margin-bottom: 20px;
			/* Add some bottom margin for spacing */
		}

		.container img {
			cursor: pointer;
		}

		.post form {
			margin: 20px 15px;
		}

		.post form .content,
		.audience .list li .column {
			display: flex;
			align-items: center;
		}

		.post form .content .details {
			margin: -3px 0 0 12px;
		}
		.postedit{
			padding: 0px;
			float: right;
			margin-top: -45px;
			
		}

		.editbtn {
			border: none;
			color: white;
			padding: 0px 0px;
			text-align: center;
			text-decoration: none;
			font-size: 16px;
			width: 40px;
			height: 40px;
			border-radius: 50px;
			background-color: #c7c8c9;
			color: black;
			border: 3px solid #f2f2f2;
		}

		.editbtn:hover {
			background-color: #e0e0e0;
			box-shadow: 0 0px 20px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
		}

		.post form .content .deletebtn {
			margin: -3px 0 0 12px;
		}

		form :where(p, button) {
			width: 100%;
			outline: none;
			border: none;
		}

		form p {
			resize: none;
			font-size: 18px;
			margin-top: 30px;
			min-height: 20px;
		}

		form button {
			margin-top: 30px;
			width: 150px;
			font-weight: 500;
			cursor: pointer;
			color: #383838;

			border-radius: 7px;


		}

		form .upload {
			display: flex;
			justify-content: center;
			align-items: center;

			height: 57px;
			margin: 15px 0;

			border-radius: 7px;
			border: 1px solid #B9B9B9;
			box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		}

		form .upload img,
		form .upload h3 {
			margin: 0 10px;
			/* Add space between img and h3 */
			cursor: pointer;
			/* Add cursor pointer */
		}

		/* Popup styling */
		.popup {
			display: none;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 500px;
			/* Set the width of the popup */
			height: auto;
			/* Set the height of the popup */
			padding: 20px;
			background: #fff;
			border-radius: 10px;
			box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
			z-index: 1000;
			overflow: auto;
		}

		.overlay {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			z-index: 999;
		}

		.btn-close {
			position: absolute;
			top: 10px;
			right: 10px;
			cursor: pointer;
		}

		.btn-upload {


			border: none;
			color: white;
			padding: 0px 0px;
			text-align: center;
			text-decoration: none;
			font-size: 16px;
			min-width: 250px;
			width: 70%;
			height: 60px;
			border-radius: 50px;
			margin-bottom: 20px;
			margin-top: 20px;
			background-color: #f2f2f2;
			color: black;
			border: 3px solid #f2f2f2;
		}

		.btn-upload:hover {
			background-color: #e0e0e0;
			box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
		}

		@keyframes likeAnimation {
			0% {
				transform: scale(1);
			}

			50% {
				transform: scale(1.2);
			}

			100% {
				transform: scale(1);
			}
		}

		/* Apply animation to the like button */
		button.like-animation {
			animation: likeAnimation 1s ease-in-out;
		}

		button {
			background-color: #a7a7a8;
			/*btn bg color*/
			color: white;
		}

		button.like-animation.clicked {
			background-color: #3f88e8;
			/*btn bg color*/
			color: white;
		}
	</style>

	<script>
		async function togglePopup() {
			var popup = document.getElementById('popup');
			var overlay = document.getElementById('overlay');

			// Fetch the content of the second HTML
			try {
				const response = await fetch('Create%20Post/Createpost.php');
				const data = await response.text();
				document.getElementById('popup-content').innerHTML = data;

				// Show the popup and overlay
				popup.style.display = 'block';
				overlay.style.display = 'block';
			} catch (error) {
				console.error('Error:', error);
			}
		}


		function closePopup() {
			var popup = document.getElementById('popup');
			var overlay = document.getElementById('overlay');
			popup.style.display = 'none';
			overlay.style.display = 'none';
			location.reload();
		}

		function likePost(postId) {
			const likeBtn = document.getElementById('likeBtn_' + postId);
			const likeCountElement = document.getElementById('likeCount_' + postId);

			likeBtn.classList.add('like-animation', 'clicked'); // Add animation and clicked class

			// Use AJAX to send a request to update likes_count in the database
			const xhr = new XMLHttpRequest();
			xhr.open('POST', 'update_likes.php', true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4 && xhr.status == 200) {
					// Handle the response if needed
					console.log(xhr.responseText);

					// Update the like count in the UI without reloading the page
					likeCountElement.innerText = parseInt(likeCountElement.innerText) + 1;
				}
			};

			// Send the post ID to the server
			xhr.send('postId=' + postId);
		}



		function unlikePost(postId) {
			const unlikeBtn = document.getElementById('unlikeBtn_' + postId);
			const unlikeCountElement = document.getElementById('unlikeCount_' + postId);

			unlikeBtn.classList.add('like-animation', 'clicked'); // Add animation and clicked class

			// Use AJAX to send a request to update likes_count in the database
			const xhr = new XMLHttpRequest();
			xhr.open('POST', 'update_unlikes.php', true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4 && xhr.status == 200) {
					// Handle the response if needed
					console.log(xhr.responseText);

					// Update the unlike count in the UI without reloading the page
					unlikeCountElement.innerText = parseInt(unlikeCountElement.innerText) + 1;
				}
			};

			// Send the post ID to the server
			xhr.send('postId=' + postId);

		}

	</script>



</head>

<body class="bg-light">

	<div id="blog-container" class="container mt-5">
		<div class="row mt-3">
			<div class="col-8">
				<center><button class="btn-upload" onclick="togglePopup(); event.stopPropagation(); return false;">
						<div class="upload">
							<!--<img src="icons/emoji.svg" alt="gallery" width="30px" >-->
							<h5>Create Your own post <img src="icons/gallery.svg" alt="gallery" width="30px"></h5>
						</div>
			</div>
			<div class="col-4">
				</button></center>
				<form action="" method="POST" id="visibilityForm">
					<label for="Showing">Showing</label>
					<select name="posts_visibility" onchange="document.getElementById('visibilityForm').submit()">
						<option value="all" <?php echo ($posts_visibility == 'all') ? 'selected' : ''; ?>>All</option>
						<option value="team" <?php echo ($posts_visibility == 'team') ? 'selected' : ''; ?>>Team</option>
						<option value="my" <?php echo ($posts_visibility == 'my') ? 'selected' : ''; ?>>My</option>
					</select>
					<label for="posts">Posts</label>
					<noscript><input type="submit"></noscript>
				</form>
			</div>
		</div>


		<!-- Popup content -->
		<div id="popup" class="popup">
			<button onclick="closePopup()" class="btn-close"></button>
			<div id="popup-content"></div>
		</div>

		<!-- Overlay to darken the background -->
		<div id="overlay" class="overlay"></div>


		<?php

		// Initial number of posts to load
		$posts_per_page = 10;

		if (isset($_POST['submit'])) {
			$posts_visibility = $_POST['posts_visibility'];
		}

		if ($posts_visibility == 'my') {


			$sql = "SELECT post_id, player_id, post_text, posted_date, post_img, likes_count, unlikes_count 
                  FROM posts 
                  WHERE player_id = $logged_player_id 
                  ORDER BY post_id DESC 
                  LIMIT $posts_per_page";
			$result = $conn->query($sql);

			
			//for Own post delete button
			$own_post = true;


		} else if ($posts_visibility == "team") {
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
                  LIMIT $posts_per_page";
			$result = $conn->query($sql);





		} else {
			$sql = "SELECT post_id,player_id, post_text, posted_date, post_img, likes_count, unlikes_count 
                  FROM posts 
                  ORDER BY post_id DESC 
                  LIMIT $posts_per_page";
			$result = $conn->query($sql);

		}




		// Display initial blog posts
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {

				// get register table data
				$player_id = $row['player_id'];
				$post_id = $row['post_id'];

				//for get posts owner personal data
				$register_sql = "SELECT * FROM register WHERE player_id = $player_id";
				$register_result = $conn->query($register_sql);
				$row1 = $register_result->fetch_assoc();


				echo '<div class="post">
                    <div class="container">';
					
					if ($player_id == $logged_player_id){
					
					echo '<div class="postedit">
							
							<form method="post" action="delete.php">
							<!--<button type="submit" name="edit_button" class="editbtn">🖊️</button>-->
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
			echo '<center><p>No posts found.</p></center>';
		}


		
			
		

		//echo '<p>No more posts...</p>'; 
		
		$conn->close();
		?>
	</div>

	<script>
		// Track the current page and posts per page
		let currentPage = 1;
		const postsPerPage = <?php echo $posts_per_page; ?>;
		let visibility = '<?php echo $posts_visibility; ?>';

		// Function to load more posts using AJAX
		function loadMorePosts() {
			const container = document.getElementById('blog-container');

			// Increment the page number
			currentPage++;

			// Use AJAX to fetch more posts from the server
			const xhr = new XMLHttpRequest();
			xhr.open('GET', `load-more-posts.php?page=${currentPage}&visibility=${visibility}`, true);
			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4 && xhr.status == 200) {
					// Append the new posts to the container
					container.innerHTML += xhr.responseText;
				}
			};
			xhr.send();
		}

		// Event listener for scrolling
		window.addEventListener('scroll', function () {
			// Check if the user has reached the bottom of the page
			if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
				// Load more posts when reaching the bottom
				loadMorePosts();
			}
		});


	</script>

</body>

</html>