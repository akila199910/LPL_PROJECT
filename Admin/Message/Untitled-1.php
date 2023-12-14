
    <form action="" method="POST">

    <select id="moderator_id" name="moderator_id" required>
                <option value='' disabled selected hidden>SELECT CHAT</option>
                <?php
                // Create while loop
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['first_name'] . " ". $row['last_name']. "</option>";
                }
                ?>
            </select>
            <br><br>
        <input type="text" placeholder="Text Your Message" name="chat">
       <!-- <input type="file">-->
       <!--<input type="hidden" name="moderator_id" value="<?php echo $moderator_id;?>">-->
       <input type="submit" name ="send" >
    </form>




    <?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");

session_start();

if (isset($_SESSION['admin_id'])) {
    $admin_id= $_SESSION['admin_id'];

    if(isset($_POST['send'])){

      $admin_id=1;
      $moderator_id=$_POST['moderator_id'];
      $chat=$_POST['chat'];
      /*echo'$admin_id ';
      echo'$moderator_id ';
     echo'$chat ';*/

    
    $sqlChat ="INSERT INTO `chat`( `sender_id`, `receiver_id`, `massage`) VALUES ('$admin_id','$moderator_id','$chat')";
    $result = mysqli_query($conn, $sqlChat);
    }

} else {
    header("Location: ../logout.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>CHAT</title>
  <style>
    .chatRow{
      padding: 10px;
      
    }
  </style>
</head>

<body>
<?php

include('sidebar.php');
?>


  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;">
    LPL - LANKA PREMIER LEAGUE
  </nav>
  <div class="content">
    <div class="container">


      <?php
      $sql = "SELECT * FROM moderators";
      $result = mysqli_query($conn, $sql);
     
            while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='chatRow'>". $row['first_name'] . " ". $row['last_name']."</div>"."<br>";
                }
        ?>



    </div>
  </div>
</body>

</html>