<?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");

$sql2 = "CREATE TABLE IF NOT EXISTS admin (
   admin_id INT PRIMARY KEY AUTO_INCREMENT,
   first_name VARCHAR(255) NOT NULL,
   last_name VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   profile_picture VARCHAR(255) NOT NULL)";

   mysqli_query($conn, $sql2);
?>