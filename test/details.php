<?php
// details.php

// Assuming you have a connection to the database
$db_host = "your_db_host";
$db_user = "your_db_username";
$db_pass = "your_db_password";
$db_name = "your_db_name";

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get student ID from the URL parameter
$studentid = $_GET['studentid'];

// Retrieve student details from the "checkedStud" table
$sql = "SELECT * FROM checkedStud WHERE id = '$studentid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Display student details
    echo "Student Details:<br>";
    echo "Name: " . $row['studentname'] . "<br>";
    echo "Marks: " . $row['marks'] . "<br>";
    // Add more details to display as needed
} else {
    echo "No details found for the selected student.";
}

$conn->close();
?>
