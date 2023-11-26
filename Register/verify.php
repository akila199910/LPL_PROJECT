<?php


include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_GET['code'])) {
    $verif_code = $_GET['code'];
    
    // Check if the verification code exists in the database
    $sql = "SELECT * FROM register WHERE verification_code ='$verif_code'";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
        // Mark the user as verified
        $player_id = $row['player_id'];
        $update_sql = "UPDATE register SET verification = 1 WHERE player_id = $player_id";
        mysqli_query($conn, $update_sql);
        
        echo "<script>alert('Email address verified successfully!');</script>";
    } else {
        // JavaScript to show alert
        echo "<script>alert('Invalid verification code.');</script>";
    }
} 

mysqli_close($conn);

?>

<?php 
include('file:///C:/xampp/htdocs/LPL_PROJECT/LPL_PROJECT/home.html'); ?>