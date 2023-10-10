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
    <br>
    <a href="/Admin/Playerlist/batsmanlist.php"><button>Batsman List</button></a>
    <br>
    <a href="logout.php"><input type="button" name="logout" value="logout"></a>
    <br>
    <a href="/Admin/Addmoderator/indexmodertor.php"><button>MODARETOR</button></a>
    <br>
    <a href="/Admin/Addteam/indexteam.php"><button>TEAM</button></a>

    
</body>
</html>