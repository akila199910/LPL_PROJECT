<?php
session_start();

if (isset($_SESSION['moderators_id'])) {
    echo $_SESSION['moderators_id'];

} else {
    header("Location: logout.php");


}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Moderator dashboard</title>
</head>
<body>
    <h1> Moderator dashboard </h1>
    <input type="button" name="auction" value="Live Auction">
    <a href="logout.php"><input type="button" name="logout" value="logout"></a>

    
</body>
</html>