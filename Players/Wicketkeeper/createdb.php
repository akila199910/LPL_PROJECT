<?php
include("conn.php");
$sql3 = "CREATE DATABASE IF NOT EXISTS lplsystem";
if (mysqli_query($conn, $sql3)) {
    echo "Database Create";
} else {
    echo "Error Creating Database: " . mysqli_error($conn);
}
mysqli_close($conn);
?>