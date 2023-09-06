<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

$sql2 = "CREATE TABLE IF NOT EXISTS admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    second_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    dob date  NOT NULL,
    profile_photo VARCHAR (255))";
 
    mysqli_query($conn, $sql2);


    <form action="" method="POST"></form>
?>