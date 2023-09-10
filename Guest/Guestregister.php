<?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");

    
$sql2 = "CREATE TABLE IF NOT EXISTS guest (
    guest_id INT PRIMARY KEY AUTO_INCREMENT, 
   first_name VARCHAR(255) NOT NULL,
   last_name VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   profile_picture VARCHAR(255) NULL)";

   mysqli_query($conn, $sql2);

   if (isset($_POST["submit"])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$profile_picture = $_POST['profile_picture'];
  

   $sql = "INSERT INTO guest (first_name, last_name, email, password) 
   VALUES ('$first_name', '$last_name', '$email', '$password')";
   $result = mysqli_query($conn, $sql);
}
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guest Register</title>
    </head>
    <body>
<form action="" method ="POST">
    <p>First Name</p><input type="text" name="first_name">
    <p>Last Name</p><input type="text" name="last_name">
    <p>E-mail</p><input type="text" name="email">
    <p>Password</p><input type="password" name="password">
    
    <input type="submit" name="submit">
    </form>  
    </body>
    </html>