<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");



    
    $sql2 = "CREATE TABLE IF NOT EXISTS modarators (
        id INT PRIMARY KEY AUTO_INCREMENT,
        f_name VARCHAR(255) NOT NULL,
        l_name VARCHAR(255) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(20) NOT NULL,
        nic VARCHAR(255) NOT NULL
    )";





if (mysqli_query($conn, $sql2)) {
    echo "Modarators Registration Table Is Created";
} else {
    echo "Error Creating Table: " . mysqli_error($conn);
}

if (isset($_POST['submit'])) {
    

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $nic=$_POST['nic'];

    $sql3 = "INSERT INTO modarators (f_name, l_name, email, password,nic) 
    VALUES ('$fname', '$lname', '$email', '$pwd','$nic')";

    if (mysqli_query($conn, $sql3)) {
        echo "sub admin registation success";
    } else {
        echo "sub admin registation fail: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<form action="" method="POST">
    <table border="0">
        <tr>
            <td>F_name</td>
            <td><input type="text" name="fname"></td>
        </tr>
        <tr>
            <td>L_name</td>
            <td><input type="text" name="lname"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pwd"></td>
        </tr>
        <td>ID</td>
            <td><input type="NIC number" name="nic"></td>
        </tr>
           
    </table>
    <input type="submit" name="submit" value="SUBMIT">
</form>
