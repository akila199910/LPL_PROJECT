<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

$sql="select * from register where approved='Yes'";

$result=mysqli_query($conn,$sql);
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

  <title>Accept List</title>
  <style>
  .topnav {
    overflow: hidden;
    background-color:lightblue ;
    height:75px;
  }
  
  .topnav a {
    float: right;
    color: light-blue;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 20px;
    height:75px;
  }
  
  .topnav a:hover {
    background-color: #ddd;
    color: black;
    
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
    margin-left: auto;
    margin-right: auto;

}

  
  
  </style>
</head>

<body class="wrapper">

<div class="header">
<body>
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
    <br>
<!--<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:white;width:115%; ">
   ACCEPTED PLAYER LIST
  </nav>
-->

<div class="card" data-tilt>
<h4 style="text-align: center; color: #2980b9; font-weight: bold; text-decoration: underline;">ACCEPTED PLAYER LIST</h4><br><br>
   <div class="container">
  <table class="table table-hover text-center">
      <thead>
        <tr>
        <th>#ID</th>
          <th>Profile Photo</th>
          <th>Name</th>
          <th>Catogary</th>
          <th>Country</th>
        </tr>
      </thead>
      <tbody class="table table-hover text-center">
      <?php
      while($row=mysqli_fetch_assoc($result)){
      ?>
      <td> <?php echo $row['player_id'];?></td>
      <td>
                            <?php
                            $photoPath = "/LPL_PROJECT/LPL_PROJECT/Register/Img/proimg/" . $row['profile_photo'];
                            echo "<img src='$photoPath' alt='Profile Photo' style='width: 70px; height: 70px;'>";
                            ?>
                        </td>
       <td> <?php echo $row['first_name']." ".$row['last_name'];?></td>
       <td> <?php echo $row['catogary'];?></td>
       <td> <?php echo $row['country'];?></td>
 </tr>
      </div>
      <?php
       }?>
    </tbody>
    </table>
      
    </div>
      </div>
   
    </body>
    </html>