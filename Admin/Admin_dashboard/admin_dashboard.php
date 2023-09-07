<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    echo $_SESSION['admin_id'];

} else {
    header("Location: logout.php");


}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1> Admin Dashboard </h1>
    <input type="button" name="auction" value="Live Auction">
    <a href="logout.php"><input type="button" name="logout" value="logout"></a>

    
</body>
</html>