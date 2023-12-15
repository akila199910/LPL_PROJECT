<?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");
session_start();
$player_id = $_SESSION['user_id'];

$sql = "SELECT first_name,last_name,profile_photo FROM register WHERE player_id = $player_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // Output data of each row
  while ($row = $result->fetch_assoc()) {
      $player_name = $row['first_name']." ".$row['last_name'];
      $profile_photo = $row['profile_photo'];
  }
} 

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  

<head>
    <meta charset="utf-8">
    <title>Create Posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">


    <style>
      .profile-picture {
            width: 60px; 
            height: 60px;
            border-radius: 50%;
            overflow: hidden; /* Hide the overflowing parts of the image */
        }

        .profile-picture img {
            width: 100%; 
            height: 100%; 
            display: block; /* Remove extra space below the image */
        }


        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
      }

      .container{
        width: 80%;
        max-width: 500px;
        height: 480px;
        overflow: hidden;
        background: #fff;
        border-radius: 10px;
        transition: height 0.2s ease;
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
      }

      .container .wrapper{
        width: 100%;
        display: flex;
      }
      .container .wrapper section{
        width: 100%;
        background: #fff;
      }
      .container img{
        cursor: pointer;
      }
      .container .post{
        transition: margin-left 0.18s ease;
      }
      .container.active .post{
        margin-left: -500px;
      }
      .post header{
        font-size: 22px;
        font-weight: 600;
        padding: 17px 0;
        text-align: center;
        border-bottom: 1px solid #bfbfbf;
      }
      .post form{
        margin: 20px 25px;
      }
      .post form .content,
      .audience .list li .column{
        display: flex;
        align-items: center;
      }
      .post form .content img{
        cursor: default;
        max-width: 52px;
      }
      .post form .content .details{
        margin: -3px 0 0 12px;
      }


      form :where(textarea, button){
        width: 100%;
        outline: none;
        border: none;
      }
      form textarea{
        resize: none;
        font-size: 18px;
        margin-top: 30px;
        min-height: 100px;
      }


      form :where(.options){
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      form .options{
        height: 57px;
        margin: 1px 0;
        padding: 0 15px;
        border-radius: 7px;
        border: 1px solid #B9B9B9;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
      }

      form button{
        height: 40px;
        width: 90%;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        cursor: pointer;
        
        cursor: no-drop;
        border-radius: 7px;
        background: #2f7adc;
        transition: all 0.3s ease;
      }
    </style>


  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <section class="post">
          <header>Create Post</header>
            <form action="Create%20Post/save_post.php" method="post" enctype="multipart/form-data">
              <div class="content">
                
                <div class="profile-picture">
                  <?php echo '<img src="../Register/Img/proimg/' .$profile_photo. '" alt="Post Image" class="post-img" loading="lazy">';?>  
                </div>

                <div class="details">
                  <p><?php echo "$player_name";?></p>
                </div>

              </div>
                <input type="file" name="image" id="fileInput" style="display:none;" onchange="displayFileName()">
                <textarea name="post_text" placeholder="What's on your mind?" spellcheck="false" required></textarea>
            
                <form action="/action_page.php">
                  <div class="options">
                    <input type="file" id="myfile" name="myfile"><br><br>
                  </div>
                  <center><button type="submit">Post</button></center>
                </form>
          </form>
        </section>
        
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-sQHTxE9VntzxEydQuIcRrQvyUscFtsEYj3QPDfT9Up1Tznu1f4Ls5GRri6HJwOj3" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyD1WwpeDPeI78Mqu7gBo4pgs2EWR5gqN6" crossorigin="anonymous"></script>
    
  </body>
</html>
