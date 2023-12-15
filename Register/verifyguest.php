<?php


include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_GET['code'])) {
    $verif_code = $_GET['code'];
    
    // Check if the verification code exists in the database
    $sql = "SELECT * FROM guest WHERE verification_code ='$verif_code'";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
        // Mark the user as verified
        $guest_id = $row['guest_id'];
        $update_sql = "UPDATE guest SET verification = 1 WHERE guest_id = $guest_id";
        mysqli_query($conn, $update_sql);
        
        echo "<script>alert('Email address verified successfully!');</script>";
    } else {
        // JavaScript to show alert
        echo "<script>alert('Invalid verification code.');</script>";
    }

    echo '<script> window.location.href = "http://localhost/LPL_PROJECT/LPL_PROJECT/home.php"</script>';
} 

mysqli_close($conn);

?>

