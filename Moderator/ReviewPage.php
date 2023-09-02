<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
$sq4 = "select * from register where approved is NULL";
$result = mysqli_query($conn, $sq4);
if(isset($_POST['view'])){
    $player_id = $_POST['player_id'];
    header("Location: profile2.php");
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Review Page2</title>
</head>
<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
    LPL - LANKA PREMIER LEAGUE
  </nav>

  <div class="container">
    <table class="table table-hover text-center">
      <thead>
        <tr>
        <th>#ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Catogary</th>
          <th>Capped</th>
          <th>Country</th>
          <th>Profile</th>
        </tr>
      
      </thead>


      <tbody class="table table-hover text-center">
        
        <?php 

        
        while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
        <td><?php echo $row['player_id']; ?></td>
        <td> <?php echo $row['first_name'];?></td>
        <td> <?php echo $row['last_name'];?></td>
        <td> <?php echo $row['catogary'];?></td>
        <td> <?php echo $row['capped'];?></td>
        <td> <?php echo $row['country'];?></td>
            <td>
              <form action="profile2.php" method="POST">
                <input type="hidden" name="player_id" value="<?php echo $row['player_id']; ?>">
                <button type="submit" name="view">Profile</button>
              </form>
            </td>
          </tr>
        <?php }
?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>






<?php
/*
THIS IS CODE AFTER APPROVE MODARETOR EDIT PLAYER DETAILS
& HE RE DERECT RELAVENT PLAYER FORM


if (isset($_POST['view'])) {
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
                $sql4 = "INSERT INTO batsman (player_batting_id) VALUES ($player_id)";
                mysqli_query($conn, $sql4);
                header("Location: Batsman.html");
                exit;
                break;

            case 'bol':
                $sql5 = "INSERT INTO bowler (player_bowlling_id) VALUES ($player_id)";
                mysqli_query($conn, $sql5);
                header("Location: Bowler.html");
                exit;
                break;

            case 'wk':
                $sql6 = "INSERT INTO wicketkeeper (player_keeping_id) VALUES ($player_id)";
                mysqli_query($conn, $sql6);
                header("Location: Wicketkeeper.html");
                exit;
                break;

            case 'alr':
                $sql7 = "INSERT INTO allrounder (player_al_id) VALUES ($player_id)";
                mysqli_query($conn, $sql7);
                header("Location: Allrounder.html");
                exit;
                break;
        }
    }
}
*/?>