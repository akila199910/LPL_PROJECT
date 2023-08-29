<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

// Create playersregistation table if it doesn't exist
$sql2 = "CREATE TABLE IF NOT EXISTS price (
    id INT PRIMARY KEY AUTO_INCREMENT,
    team_name VARCHAR(255) NOT NULL,
    bid_price INT NOT NULL
)";

if (mysqli_query($conn, $sql2)) {
    echo "Price Table Is Created<br>";
} else {
    echo "Error Creating Table: " . mysqli_error($conn);
}

// Insert data into the price table
$sql = "INSERT INTO price (team_name, bid_price) 
VALUES ('kandy', 50000),
       ('colombo', 42000),
       ('galle', 20000),
       ('jaffna', 30000),
       ('dambulla', 60000)";

if (mysqli_multi_query($conn, $sql)) {
    echo "Data Inserted Successfully";
} else {
    echo "Error Inserting Data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
