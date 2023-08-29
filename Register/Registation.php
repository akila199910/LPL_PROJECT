<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

// Create playersregistation table if it doesn't exist




    //should be create photo fied in table
    $sql2 = "CREATE TABLE IF NOT EXISTS playersregistation (
        id INT PRIMARY KEY AUTO_INCREMENT,
        f_name VARCHAR(255) NOT NULL,
        l_name VARCHAR(255) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(20) NOT NULL,
        country VARCHAR(50) NOT NULL,
        level VARCHAR(5) NOT NULL,
        catogary VARCHAR(255) NOT NULL,
        dob DATE NOT NULL,
        profilepic VARCHAR(255) NOT NULL,
        num VARCHAR(255) NOT NULL,
        proof VARCHAR(255) NOT NULL,
        state VARCHAR(255) NULL
    )";
//should be not null all




if (mysqli_query($conn, $sql2)) {
    echo "Player Registration Table Is Created";
} else {
    echo "Error Creating Table: " . mysqli_error($conn);
}

if (isset($_POST['submit'])) {
    $filename1 = $_FILES['pic']['name'];
    $tempname1 = $_FILES['pic']['tmp_name'];
    $folder1 = "./pic/" . $filename1;

    $filename2 = $_FILES['proof']['name'];
    $tempname2 = $_FILES['proof']['tmp_name'];
    $folder2 = "./proof/" . $filename2;


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $co = $_POST['co'];
    $dob = $_POST['dob'];
    $catogary = $_POST['catogary'];
    $level = $_POST['level'];
    $num = $_POST['num'];


    // Insert player data into playersregistation table
    $sql3 = "INSERT INTO playersregistation (f_name, l_name, email, password, country, level, catogary, dob, profilepic, num, proof) 
    VALUES ('$fname', '$lname', '$email', '$pwd', '$co', '$level', '$catogary', '$dob', '$filename1', '$num', '$filename2')";

    if (mysqli_query($conn, $sql3)) {
        echo "Player Approved or Rejected";
    } else {
        echo "Error Adding or Rejecting Player: " . mysqli_error($conn);
    }
    if (move_uploaded_file($tempname1, $folder1)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }


    if (move_uploaded_file($tempname2, $folder2)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }



    // Redirect to another page after form submission
    if ($catogary == 'bat') {
        header("Location: Batsman.html");
    } elseif ($catogary == 'bol') {
        header("Location: Bowler.html");
    } elseif ($catogary == 'wk') {
        header("Location: Wicketkeeper.html");
    } elseif ($catogary == 'alr') {
        header("Location: Allrounder.html");
    }
    exit; // Make sure to exit after sending the header
}

mysqli_close($conn);
?>


