<?php
session_start();

if (isset($_SESSION['guest_id'])) {
    echo $_SESSION['guest_id'];

} else {
    header("Location: logout.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Guest dashboard</title>
</head>
<body>
    <h1> Guest dashboard </h1>

    <a href="Bid/auction.php"><button>Live Auction</button></a>

    <a href="logout.php"><input type="button" name="logout" value="logout"></a>

    
</body>
</html>