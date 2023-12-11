<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
$sq4 = "select * from register";
$result = mysqli_query($conn, $sq4);



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
    height: 500vh;
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
<body>
<div class="header">
<div class="navbar">
<img src="/LPL_PROJECT/LPL_PROJECT/images/lpllogo.png" width="125px" >

  <nav>
<ul>
    <li><i class="fa-solid fa-laptop"></i><a href="/LPL_PROJECT/LPL_PROJECT/Moderator/Moderator_dashboard/moderator_dashboard.php">Dashboard</a></li>
    <li><i class="fa-solid fa-right-from-bracket"></i><a href="/LPL_PROJECT/LPL_PROJECT/Moderator/Moderator_dashboard/logout.php">Log Out</a></li>
</ul>
</nav>

</div>

<div class="card" data-tilt>
  <div class="content">


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
            
          </tr>
        <?php }
?>
      </tbody>
    </table>
        </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </div>
        </div>
</body>
</html>
