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
  $player_id = $_POST['player_id'];
  $sql = "UPDATE register SET approved = 'Yes' WHERE player_id = $player_id";
  mysqli_query($conn, $sql);

  $catogary = "SELECT catogary FROM register WHERE player_id = $player_id";
  $catogaryResult = mysqli_query($conn, $catogary);

  if ($catogaryResult && mysqli_num_rows($catogaryResult) > 0) {
      $row = mysqli_fetch_assoc($catogaryResult);
      $catogaryValue = $row['catogary'];

      switch ($catogaryValue) {
          case 'bat':
              header("Location: /Players/Batsman/Batsman.php?player_id=$player_id"); // Include player_id as a query parameter
              exit;
              break;

          case 'bol':
              header("Location: /Players/Bowler/Bowler.php?player_id=$player_id"); // Include player_id as a query parameter
              exit;
              break;

          case 'wk':
              header("Location: /Players/Wicketkeeper/Wicketkeeper.php?player_id=$player_id"); // Include player_id as a query parameter
              exit;
              break;

          case 'alr':
              header("Location: /Players/Allrounder/Allrounder.php?player_id=$player_id"); // Include player_id as a query parameter
              exit;
              break;
      }
  }
}

    

if (isset($_POST['reject'])) {
  $player_id = $_POST['player_id'];
    $sq2 = "UPDATE register SET approved = 'No' WHERE player_id = $player_id";
    mysqli_query($conn, $sq2);
    header("Location: /Moderator/ReviewPage.php");

}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        
    /*.profile {
      width: 300px;
      height: 300px;
      float: right  
            }*/

    body,h1 {font-family: "Raleway", sans-serif}
    body, html {height: 100%}
    .bgimg {
    background-color: #57aede;
    min-height: 100%;
    background-position: center;
    background-size: cover;

    .w3-sidebar {width: 120px;background: #222;}
    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {margin-left: 300px; margin-right:300px}
    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {#main {margin-left: 0}}
    }
    
  </style>
    <title>Player Review</title>
</head>
<body>
    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <div class="w3-display-topleft w3-padding-large w3-xlarge">
    <img src="5.png" width=300px; height=140px;>
    </div>

    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
        LPL - LANKA PREMIER LEAGUE
    </nav>

    <div class="container mt-4">

    <div class="profile mb-4 col-12">
      <img src="images/<?php echo $file_name3; ?>" alt="Profile Photo" class="profile ">
      
    </div> 

    <div class="form-group mt-4 ">
      <h3> <?php echo $first_name; ?>  <?php echo $last_name; ?></h3>

    </div>


      <table class="table tablefa-bordered table-striped table-hover" >
        <tr>
          <th>Age:</th>
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

    <div class="row">
      <div class="form-group col-12 col-xl-6">
        <label for=" NIC Photo"><h3>NIC Photo</h3></label>
        <img src="images/<?php echo $file_name1; ?>" alt="NIC Photo" width="420px" height="350">
      </div>

      <div class="form-group col-12 col-xl-6">
        <label for=" Certificate photos"><h3>Certificate photos</h3></label>
        <img src="<?php echo $file_name2; ?>" alt="Certificate Photo">
      </div>
    </div>
        

        <form action="" method="POST">
                <input type="hidden" name="player_id" value="<?php echo $row['player_id']; ?>">
                <button type="submit" name="approve">Approve</button>
              </form>
        
        
              <form action="" method="POST">
                <input type="hidden" name="player_id" value="<?php echo $row['player_id']; ?>">
                <button type="submit" name="reject">Reject</button>
              </form>

              </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

