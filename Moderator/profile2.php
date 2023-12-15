<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_POST['view'])) {
    $player_id = $_POST['player_id'];
    $sql = "SELECT * FROM register WHERE player_id = $player_id";
    $ReviewPlayer = mysqli_query($conn, $sql);

    if ($ReviewPlayer && mysqli_num_rows($ReviewPlayer) > 0) {
        $row = mysqli_fetch_assoc($ReviewPlayer);

        // Debugging: Check if data is fetched correctly
        // var_dump($row);

        // Assign variables from the fetched data
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $password = $row['password'];
        $country = $row['country'];
        $dob = $row['dob'];
        $identity = $row['identity'];
        $identity_number = $row['identity_number'];
        $catogary = $row['catogary'];
        $capped = $row['capped'];
        $additional_details = $row['additional_details'];
        $approved = $row['approved'];
        $file_name3 = $row['profile_photo'];
        $file_name1 = $row['identity_photo'];
        $file_name2 = $row['certificate_photo'];

    }
}

//Approve reject list
if (isset($_POST['approve'])) {
  session_start();
  $modaretor_id=$_SESSION['moderators_id'];

  $player_id = $_POST['player_id'];
  $sql = "UPDATE register SET approved = 'Yes' WHERE player_id = $player_id";
  mysqli_query($conn, $sql);
  $sql2 = "UPDATE register SET moderators_id = '$modaretor_id' WHERE player_id = $player_id";
  mysqli_query($conn, $sql2);

//Try to get old data for data table.

$sql3 = "SELECT * FROM rule";
$RuleResult = mysqli_query($conn, $sql3);
if(mysqli_num_rows($RuleResult) > 0 &&$RuleResult) {

  $row = mysqli_fetch_assoc($RuleResult);
  $year = $row['auction_year'];
}

$sqlInsert="INSERT INTO `data`( `player_id`, `year`) VALUES ($player_id,$year)";
mysqli_query($conn, $sqlInsert);


  $catogary = "SELECT catogary FROM register WHERE player_id = $player_id";
  $catogaryResult = mysqli_query($conn, $catogary);

  if ($catogaryResult && mysqli_num_rows($catogaryResult) > 0) {
      $row = mysqli_fetch_assoc($catogaryResult);
      $catogaryValue = $row['catogary'];

      switch ($catogaryValue) {
          case 'BATSMAN':
              header("Location: Batsman/Batsman.php?player_id=$player_id"); // Include player_id as a query parameter
              exit;
              

          case 'BOWLER':
              header("Location: Bowler/Bowler.php?player_id=$player_id"); // Include player_id as a query parameter
              exit;
              

          case 'WICKETKEEPER':
              header("Location: Wicketkeeper/Wicketkeeper.php?player_id=$player_id"); // Include player_id as a query parameter
              exit;
            

          case 'ALLROUNDER':
              header("Location: Allrounder/Allrounder.php?player_id=$player_id"); // Include player_id as a query parameter
              exit;
              
      }
  }
}

    

if (isset($_POST['reject'])) {
  session_start();
  $modaretor_id=$_SESSION['moderators_id'];

    $player_id = $_POST['player_id'];
    $sq2 = "UPDATE register SET approved = 'No' WHERE player_id = $player_id";
    mysqli_query($conn, $sq2);
    $sql3 = "UPDATE register SET moderators_id = '$modaretor_id' WHERE player_id = $player_id";
    mysqli_query($conn, $sql3);
    header("Location:/Moderator/ReviewPage.php");

}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        
    .profile {
      width: 300px;
      height: 300px;
      float: right  
            }


   .header{
    background: radial-gradient(#fff,#5960de);
}



.card{
    width: 95%;
    max-width: 3000px;
    color: #fff;
    text-align: center;
    padding: 50px 35px;
    border: 1px solid rgba(255,255,255,0.3);
    background: rgba(255,255,255,0.2);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(5px);
    

}
   
.btn{
    display: inline-block;
    background: #ff523b;
    color: #fff;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: background 0.5s;
}

.btn:hover{
    background: #5960de;
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

  </style>
    <title>Player Review</title>
</head>
<body>
<div class="header">
<div class="navbar">
        <div class="logo">
           <a href="home.php"><img src="../images/lpllogo.png" width="125px"></a>
        </div>
        
        <nav>
            <ul>
                <li><i class="fa-solid fa-laptop"></i><a href="">Dashboard</a></li>
                <li><i class="fa-solid fa-right-from-bracket"></i><a href="about.php">Log Out</a></li>
                
            </ul>
        </nav>
       
    </div>
    <br><br><br><br>

    <div class="container mt-4">

    <div class="profile mb-4 col-12">
    <?php
            $photoPath = "/LPL_PROJECT/LPL_PROJECT/Register/Img/proimg/" . $row['profile_photo'];
              echo "<img src='$photoPath' alt='Profile Photo' style='width: 300px; height: 300px;'>";
      ?>
      
    </div> 

    <div class="form-group mt-4 ">
      <h3> <?php echo $first_name; ?>  <?php echo $last_name; ?></h3>

    </div>

    <div class="card" data-tilt>
      <table class="table tablefa-bordered table-striped table-hover" >
        <tr>
          <th>Age</th>
          <td>
            <?php echo $dob; ?>
          </td>
        </tr>

        <tr>
          <th> Category:</th>
          <td>
            <?php echo $catogary; ?>
          </td>
        </tr>


        <tr>
          <th>Country</th>
          <td>
            <?php echo $country; ?>
          </td>
        </tr>


        <tr>
          <th>E-mail</th>
          <td>
            <?php echo $email; ?>
          </td>
        </tr>

        <tr>
          <th>Capped</th>
          <td>
            <?php echo $capped; ?>
          </td>
        </tr>

        <tr>
          <th>Verification Method:</th>
          <td>
            <?php echo $identity; ?>
          </td>
        </tr>

        <tr>
          <th>ID Number:</th>
          <td>
            <?php echo $identity_number; ?>
          </td>
        </tr>

        <tr>
          <th>Additional details</th>
          <td>
            <?php echo $additional_details; ?>
          </td>
        </tr>
      </table>
</div>

<br><br>
    <div class="row">
      <div class="form-group col-12 col-xl-6">
        <label for=" NIC Photo"><h3>NIC Photo</h3></label>
        <?php
            $photoPath = "/LPL_PROJECT/LPL_PROJECT/Register/Img/idimg/" . $row['identity_photo'];
              echo "<img src='$photoPath' alt='identity_photo' style='width: 400px; height: 300px;'>";
      ?>
      </div>

      <div class="form-group col-12 col-xl-6">
        <label for=" Certificate photos"><h3>Certificate photos</h3></label>
        <?php
            $photoPath = "/LPL_PROJECT/LPL_PROJECT/Register/Img/cetiimg/" . $row['certificate_photo'];
              echo "<img src='$photoPath' alt='certificate_photo' style='width: 400px; height: 300px;'>";
      ?>
      </div>
    </div>
        

        <form action="" method="POST">
                <input type="hidden" name="player_id" value="<?php echo $row['player_id']; ?>">
                <button type="submit" name="approve" class="btn">Approve</button>
              </form>
        
        
              <form action="" method="POST">
                <input type="hidden" name="player_id" value="<?php echo $row['player_id']; ?>">
                <button type="submit" name="reject" class="btn">Reject</button>
              </form>

              </div>
            


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
          </div>
</body>
</html>

