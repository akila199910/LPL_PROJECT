<?php
session_start();

if (isset($_SESSION['user_id'])) {
    echo $_SESSION['user_id'];

} else {
    header("Location: logout.php");


}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Player Dashboar</title>
</head>
<body>
    <h1> Player Dashboard </h1>
    <input type="button" name="auction" value="Live Auction">
    <a href="logout.php"><input type="button" name="logout" value="logout"></a>

    
</body>
</html>