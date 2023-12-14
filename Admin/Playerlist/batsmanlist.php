<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {



  //batsmanlistcode
  $sql5 = "SELECT b.*, r.profile_photo, r.first_name,r.last_name,r.country
  FROM batsman b
  JOIN register r ON b.player_batting_id = r.player_id
  WHERE b.gotoauction IS NULL AND b.sold IS NULL;
  ";




$result = mysqli_query($conn, $sql5);
$sql6 = "SELECT * from rule";
$resultTime = mysqli_query($conn, $sql6);

while ($rowTime = mysqli_fetch_assoc($resultTime)) {

  $periadTime=$rowTime['auction_duration_time'];
  
      
 }

 $startDate="SELECT start FROM rule";
 $resultDate=mysqli_query($conn,$startDate);
 if(mysqli_num_rows($resultDate) >0) {
     while($rowDate = mysqli_fetch_array($resultDate)) {
         $start_date = $rowDate['start'];
 
 }
 }

 $currentDate = date('Y-m-d');









$sql2 = "CREATE TABLE IF NOT EXISTS auction (
  auction_id INT PRIMARY KEY AUTO_INCREMENT,
  player_id INT NOT NULL,
  auction_start_time TIMESTAMP,
  auction_end_time TIMESTAMP NULL,
  active INT NULL,
  FOREIGN KEY (player_id) REFERENCES register(player_id)
  )";
  mysqli_query($conn,$sql2);


  if(isset($_POST['push'])){
    $player_id = $_POST['player_batting_id'];

    /*$sqlupdate="UPDATE batsman SET gotoauction=1 WHERE player_batting_id=$player_id";
    mysqli_query($conn,$sqlupdate);*/


    $current_time = time();
    $auction_end_time = $current_time + ($periadTime * 60); 
  
    // Convert the timestamps to formatted time strings
    $current_time_formatted = date("Y-m-d H:i:s", $current_time);
    $auction_end_time_formatted = date("Y-m-d H:i:s", $auction_end_time);


    $sql5 = "SELECT player_id FROM auction WHERE player_id=$player_id";
    $result = mysqli_query($conn, $sql5);

    while ($rowID = mysqli_fetch_assoc($result)) {

      $rowIDPlayer=$rowID['player_id'];

    }


   if($rowIDPlayer==$player_id){

    header("Location: profile1.php?player_id=$player_id");
    exit; 


   }else{

    $sql6 = "INSERT INTO auction (`player_id`, `active`, `auction_start_time`, `auction_end_time`) VALUES ('$player_id', 0, '$current_time_formatted', '$auction_end_time_formatted')";
    mysqli_query($conn, $sql6);
    header("Location: profile1.php?player_id=$player_id");
    exit; // Make sure to exit after the redirect

   }


  
    
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

 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Batsman Page</title>
  <style>
    td{
      vertical-align: middle;
    }
    .text{
      text-align: center;
    }


    

.header{
    background: radial-gradient(#fff,#5960de);
    height: 500vh;
}


.card{
    width: 75%;
    max-width: 3000px;
    color: #000;
    text-align: center;
    padding: 50px 35px;
    border: 1px solid rgba(255,255,255,0.3);
    background: rgba(255,255,255,0.2);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(5px);
    margin-left: auto;
    margin-right: auto;

}

.bt{
    display: inline-block;
    background: #0096FF;
    
    padding: 8px 30px;
    margin: -40px 0;
    border-radius: 30px;
    border:none;
    transition: background 0.5s;
}

.bt:hover{
    background: #5960de;
}
.navbar{
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: #4169E1;
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

p{
    color: #fff;
    text-align:center;
}


</style>
</head>
<div class="header">
<body>
<?php

include('sidebar.php');
?>
 <div class="navbar row">
        <div class="logo col-4" >
           <img src="../../images/lpllogo.png" width="125px"> 
        </div>

        <div class="col-8" style="color: #fff; font-size:20px;">   LPL - LANKA PREMIER LEAGUE</div>
        </nav>
       
    </div>
  <div class="content">
    <?php echo $start_date; ?>
    <div class="card" data-tilt>
  <div class="container">
    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
        <th>Profile</th>
          <th>Name</th>
          <th>Country</th>
          <th>Auction</th>
        </tr>
      
      </thead>


      <tbody class="table table-hover text-center">
        
        <?php 

        
        while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr><td>
        <?php
              $photoPath = "../../Register/Img/proimg/" . $row['profile_photo'];
              echo "<img src='$photoPath' alt='Profile' style='width: 100px; height: 100px;border-radius: 50%;'>";
                         ?>


                        </td>
        <td class="text"> <?php echo $row['first_name']." ".$row['last_name'] ;?></td>
        <td class="text"> <?php echo $row['country'];?></td>
            <td>
              <form action="" method="POST">
                <input type="hidden" name="player_batting_id" value="<?php echo $row['player_batting_id']; ?>">
                <button type="submit" class="bt" name="push">Push</button>
              </form>
            </td>
          </tr>
        <?php }
?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </div>
        <script>
              var btndate = <?php echo json_encode($start_date); ?>;
              console.log(btndate);
              var currentdate = <?php echo json_encode($currentDate); ?>;
              console.log(currentdate);
              if(btndate>currentdate){
                var btns = document.getElementsByClassName("btn");
                for (var i = 0; i < btns.length; i++) {
        btns[i].disabled = true;
    }
              }

        </script>
</body>
</html>
