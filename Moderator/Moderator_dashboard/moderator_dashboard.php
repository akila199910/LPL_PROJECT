<?php

session_start();
include "conn.php";
mysqli_select_db($conn,"lplsystem");

if (!isset($_SESSION['moderators_id'])) {
    header("Location: logout.php");
    exit(); // It's recommended to stop script execution after redirection
}
$moderator_id = $_SESSION['moderators_id'];
// Fetch moderator's name based on the ID
$sql = "SELECT first_name,last_name FROM moderators WHERE id = $moderator_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $moderator_name = $row['first_name']." ".$row['last_name'];
    }
} else {
    $moderator_name = "Unknown";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Moderator</title>
  <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="/LPL_PROJECT/LPL_PROJECT/Moderator/Moderator_dashboard/sidebarstyle.css">
        <style>
          .size {
            width: 200px;
            height: 200px;
          }
          .btn-margin {
            margin-bottom: 15px;
          }


          .navbar {
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: #4169E1;
    z-index: 1000;
    width: 100vw; 
    position: fixed; 
    top: 0; 
    left: 0; 
}


nav{
    flex: 1;
    text-align: right;
}

nav ul{
    display: inline-block;
    list-style-type: none;
}

nav ul li{
    display: inline-block;
    margin-right: 20px;
}

nav ul li i{
    margin-right: 15px;

}

a{
    text-decoration: none;
    color: #555;
}

.header{
    background: radial-gradient(#fff,#5960de);
    height:100vh;
}

        </style>
</head>


<div class="header">
<body>
<div class="navbar">
        <div class="logo">
           <a href=""><img src="../../images/lpllogo.png" width="125px"></a>
        </div>
        
        <nav>
            <ul>
                <li><i class="fa-solid fa-laptop"></i><a href="moderator_dashboard.php">Dashboard</a></li>
                <li><i class="fa-solid fa-right-from-bracket"></i><a href="logout.php">Log Out</a></li>
                
            </ul>
        </nav>
       
    </div>
    <br><br><br><br>
<div class="sidebar">
  <div class="toggle-btn" onclick="show()">      
  <div class="name">
    <?php
        echo $moderator_name;
    ?>
  </div>

  <a href="moderator_dashboard.php" class="btn btn-primary btn-block">Dashboard</a>
    <a href="../ReviewPage.php" class="btn btn-primary btn-block"> Pending List</a>
    <a href="../Accept.php" class="btn btn-primary btn-block"> Accept list</a>
    <a href="../Reject.php" class="btn btn-primary btn-block"> Reject List</a>
    <a href="logout.php" class="btn btn-primary btn-block">Log Out</a>
      
</div>
</div>



<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <a href="../registered.php"><button type="button" class="btn btn-dark size btn-margin">Registered Players<br>
        <?php
                    
        $sql="SELECT * from register";
        $result=$conn-> query($sql);
        $count=0;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
    
                $count=$count+1;
            }
        }
        echo $count;
        ?>
        </button></a>
      </div>
    
      <div class="col-lg-3">
        <a href="../Accept.php"><button type="button" class="btn btn-info size btn-margin">Approved Players<br>
          <?php
            $sql="SELECT * from register where approved='Yes'";
            $result=$conn-> query($sql);
            $count=0;
            if ($result-> num_rows > 0){
              while ($row=$result-> fetch_assoc()) {
                $count=$count+1;
              }
            }
            echo $count;
          ?>
          </button></a>
      </div>

      <div class="col-lg-3">
        <a href="../Reject.php"><button type="button" class="btn btn-success size btn-margin">Rejected Players<br>
        <?php
          $sql="SELECT * from register where approved='No'";
          $result=$conn-> query($sql);
          $count=0;
          if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
              $count=$count+1;
            }
          }
          echo $count;
        ?>
        </button></a>
      </div>

      <div class="col-lg-3">
        <a href="../ReviewPage.php"><button type="button" class="btn btn-primary size btn-margin">Pending...<br>
        <?php
          $sql="SELECT * from register where approved is NULL";
          $result=$conn-> query($sql);
          $count=0;
          if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
              $count=$count+1;
            }
          }
          echo $count;
        ?>
        </button></a>
      </div>
      <div class="col-lg-3">
      
            <a href="../Bid/auction.php"><button type="button" class="btn btn-dark size btn-margin">LIVE AUCTION !!<br>
              <?php
                          
              $sql="SELECT * from moderators ";
              $result=$conn-> query($sql);
              $count=0;
              if ($result-> num_rows > 0){
                  while ($row=$result-> fetch_assoc()) {
          
                      $count=$count+1;
                  }
              }
              echo $count;
          ?></button></a>
           </div>
      <?php
        $conn->close();
      ?>
    </div>
  </div>
</div>
        </div>

        <script>
          function show() {
            document.getElementById('slidebar').classList.toggle('active');
          }
          </script>
</body>
</html>
