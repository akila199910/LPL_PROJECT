<?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");


//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {
   
   
   //add moderator code
   $sql2 = "CREATE TABLE IF NOT EXISTS moderators (
      id INT PRIMARY KEY AUTO_INCREMENT,
      first_name VARCHAR(100) NOT NULL,
      last_name VARCHAR(100) NOT NULL,
      email VARCHAR(100) NOT NULL,
      password VARCHAR(100) NOT NULL,
      gender VARCHAR(255)  NULL)";
   
      mysqli_query($conn, $sql2);
   if (isset($_POST["submit"])) {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $gender = $_POST['gender'];
      
   
      // Encrypt the password using password_hash() function
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
   
   
      $sql = "INSERT INTO moderators (first_name, last_name, email, password, gender) VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$gender')";
   
   
      $result = mysqli_query($conn, $sql);
   
      if ($result) {
         header("Location: indexmodertor.php?msg=New moderator created successfully");
      } else {
         echo "Failed: " . mysqli_error($conn);
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

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>ADD MODERATOR</title>
   <style>
      .header{
    background: radial-gradient(#fff,#5960de);
    height: 500vh;
}

.card{
    width: 95%;
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

.btn{
    display: inline-block;
    background: #ff523b;
    
    padding: 8px 30px;
    margin: -40px 0;
    border-radius: 30px;
    transition: background 0.5s;
}

.btn:hover{
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
<div class="navbar row">
        <div class="logo col-4" >
           <img src="../../images/lpllogo.png" width="125px"> 
        </div>

        <div class="col-8" style="color: #fff; font-size:20px;">   LPL - LANKA PREMIER LEAGUE</div>
        </nav>
       
    </div>
   <div class="card" data-tilt>
   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Moderator</h3>
         <p class="text-muted">Fill the form below to add a new moderator</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">First Name:</label>
                  <input type="text" class="form-control" name="first_name" placeholder="First name">
               </div>

               <div class="col">
                  <label class="form-label">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" placeholder="Last name">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Email:</label>
               <input type="email" class="form-control" name="email" placeholder="moderator@gmail.com">
            </div>
            <div class="mb-3">
               <label class="form-label">Password:</label>
               <input type="password" class="form-control" name="password" placeholder="password">
            </div>

            <div class="form-group mb-3">
               <label>Gender:</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="gender" id="male" value="male">
               <label for="male" class="form-input-label">Male</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="gender" id="female" value="female">
               <label for="female" class="form-input-label">Female</label>
            </div>
            <br>

            <div>
               <button type="submit" class="btn" name="submit">Save</button>
               <a href="indexmodertor.php" class="btn">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>