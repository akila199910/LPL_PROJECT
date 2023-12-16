<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
session_start();
//$logged_player_id = $_SESSION['guest_id'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
<link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<meta http-equiv="refresh" content="3">-->

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>LpL Posts</title>
	<style>
		.profile-picture {
			width: 70px;
			height: 70px;
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

		body{
			background: radial-gradient(#fff,#797fe0);
			margin-top: -25px;

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
			width: 900px;
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
		

		.heartbtn {
			border: none;
			color: white;
			padding: 0px 0px;
			text-align: center;
			text-decoration: none;
			width: 60px;
			height: 56px;
			margin-right: px;
			border-radius: 50px;
			background-color: #c7c8c9;
			color: black;
			border: 3px solid #f2f2f2;
			margin-bottom: 10px;
		}

		.heartbtn img {
    		width: 100%; 
    		height: 95%; 
    		border-radius: 50%;
			align-items: center;
			margin-top: 1px;
			margin-bottom: 2px;
			
			
		}

		.heartbtn:hover {
			background-color: #bd6666;
			box-shadow: 0 0px 20px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
		}

		.heartcount {
			border: none;
			color: white;
			padding: 0px 0px;
			text-align: center;
			margin-top: 10px;
			text-decoration: none;
			width: 100px;
			height: 56px;
			border-radius: 20%;
			background-color: #c7c8c9;
			color: black;
			border: 3px solid #f2f2f2;
			font-family: 'Varela Round';font-size: 18px;
			
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

		button:hover {
			background-color: #d64747;
			box-shadow: 0 0px 20px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);}

		button.like-animation.clicked {
			background-color: #ed1d24;
			/*btn bg color*/
			color: white;
		}
		

		
	</style>

	<script>
	
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


	</script>



</head>

<body>

	<div id="blog-container" class="container mt-5">
		
		<?php

		// Initial number of posts to load
		$posts_per_page = 10;

		
			$sql = "SELECT post_id,player_id, post_text, posted_date, post_img, likes_count 
                  FROM posts 
                  ORDER BY post_id DESC 
                  LIMIT $posts_per_page";
			$result = $conn->query($sql);




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

		// Function to load more posts using AJAX
		function loadMorePosts() {
			const container = document.getElementById('blog-container');

			// Increment the page number
			currentPage++;

			// Use AJAX to fetch more posts from the server
			const xhr = new XMLHttpRequest();
			xhr.open('GET', `guest-load-more-posts.php?page=${currentPage}`, true);
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