<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
$sq4 = "select * from register";
$result = mysqli_query($conn, $sq4);

//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {
    
} else {
    header("Location: /LPL_PROJECT/LPL_PROJECT/Admin/logout.php");
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

  <title>Registered Players</title>
</head>
<body>
<?php

include('../sidebar.php');
?>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
    LPL - LANKA PREMIER LEAGUE
  </nav>
  <div class="content">


  <div class="container">
    <table class="table table-hover text-center">
      <thead>
        <tr>
       
          <th>Photo</th>
          <th>Name</th>
          <th>Catogary</th>
          <th>Capped</th>
          <th>Country</th>
        </tr>
      
      </thead>


      <tbody class="table table-hover text-center">
        
        <?php 

        
        while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
        <td>
                           


                            <?php
            $photoPath = "/LPL_PROJECT/LPL_PROJECT/Register/Img/proimg/" . $row['profile_photo'];  ?>
            
              <img src='$photoPath' alt='Profile' style="width: 100px; height: 100px; border-radius: 50%;'>
            



                        </td>
        
        <td> <?php echo $row['first_name']." ". $row['last_name'];?></td>
        
        <td> <?php echo $row['catogary'];?></td>
        <td> <?php echo $row['capped'];?></td>
        <td> <?php echo $row['country'];?></td>
            
          </tr>
        <?php }
?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </div>
</body>
</html>
