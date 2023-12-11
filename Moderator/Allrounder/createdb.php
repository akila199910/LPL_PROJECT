<?php
include("conn.php");
$sql3 = "CREATE DATABASE IF NOT EXISTS lplsystem";
if (mysqli_query($conn, $sql3)) {
    echo "";
} else {
    echo "Error Creating Database: " . mysqli_error($conn);
}
mysqli_close($conn);
?>