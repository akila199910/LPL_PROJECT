<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
$sq4 = "select * from register";
$result = mysqli_query($conn, $sq4);

//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {
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

  <title>Registered Players</title>
  <style>
    td {
      vertical-align: middle;
    }

    .text {
      text-align: center;
    }


    .size {
      width: 200px;
      height: 200px;
    }

    .btn-margin {
      margin-bottom: 15px;
    }




    .header {
      background: radial-gradient(#fff, #5960de);
      height: 100%;
    }


    .card {
      width: 80%;
      max-width: 3000px;
      color: #fff;
      text-align: center;
      padding: 50px -100px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      background: rgba(255, 255, 255, 0.2);
      border-radius: 16px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(5px);
      margin-left: auto;
      margin-right: 30px;

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
    .navbar {
      display: flex;
      align-items: center;
      padding: 20px;
      background-color: #4169E1;
    }

    nav {
      flex: 1;
      text-align: right;
    }

    nav ul {
      display: inline-block;
      list-style-type: none;
    }

    nav ul li {
      display: inline-block;
      margin-right: 20px;
    }

    nav ul li i {
      margin-right: 15px;

    }

    a {
      text-decoration: none;
      color: #555;
    }

    p {
      color: #fff;
      text-align: center;
    }
  </style>
</head>
<div class="header">

  <body>
    <?php

    include('sidebar.php');
    ?>
    <div class="navbar row">
      <div class="logo col-4">
        <img src="../../images/lpllogo.png" width="125px">
      </div>

      <div class="col-8" style="color: #fff; font-size:20px;"> LPL - LANKA PREMIER LEAGUE</div>
      </nav>

    </div>
    <br><br><br><br><br><br>
  
    <div class="card" data-tilt>
      <br>


      <div class="container">
        <table class="table table-hover text-center">
          <thead class="table-dark">
            <tr>

              <th>Photo</th>
              <th>Name</th>
              <th>Catogary</th>
        
              <th>Country</th>
            </tr>

          </thead>


          <tbody class="table table-hover text-center">


            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <td>
                <?php
                $photoPath = "../../Register/Img/proimg/" . $row['profile_photo'];
                echo "<img src='$photoPath' alt='Profile Photo' style='width: 100px; height: 100px; border-radius: 50%;'>";
                ?>
              </td>
              <td> <?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
              <td> <?php echo $row['catogary']; ?></td>
              <td> <?php echo $row['country']; ?></td>
              </tr>
            <?php
            }
            ?>

          </tbody>
        </table>

  </body>

</html>