<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

// Create playersregistation table if it doesn't exist




    //should be create photo fied in table
    $sql2 = "CREATE TABLE IF NOT EXISTS auction (
        id INT PRIMARY KEY AUTO_INCREMENT,
        f_name VARCHAR(255) NOT NULL
    )";

if (mysqli_query($conn, $sql2)) {
    echo "Auction Table Is Created";
} else {
    echo "Error Creating Table: " . mysqli_error($conn);
}

$sqlInsertData = "INSERT INTO auction (f_name) VALUES 
    ('ku1'),
    ('ku2'),
    ('ku3'),
    ('krw')";

if (mysqli_query($conn, $sqlInsertData)) {
    echo "Initial Data Inserted Successfully";
} else {
    echo "Error Inserting Data: " . mysqli_error($conn);
}









?>