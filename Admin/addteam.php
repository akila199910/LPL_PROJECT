<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");


 $sql2 = "CREATE TABLE IF NOT EXISTS addteam (
        id INT PRIMARY KEY AUTO_INCREMENT,
        t_name VARCHAR(255) NOT NULL,
        o_name VARCHAR(255) NOT NULL,
        icon VARCHAR(255)  NULL
        
    )";





if (mysqli_query($conn, $sql2)) {
    echo "Team Registration Table Is Created";
} else {
    echo "Error Creating Table: " . mysqli_error($conn);
}

if (isset($_POST['submit'])) {
    

    $tname = $_POST['tname'];
    $oname = $_POST['oname'];
    
    $filename1 = $_FILES['icon']['name'];
    $tempname1 = $_FILES['icon']['tmp_name'];
    $folder1 = "./icon/" . $filename1;        



    $sql3 = "INSERT INTO addteam (t_name, o_name,icon) 
    VALUES ('$tname', '$oname','$filename1')";

    if (mysqli_query($conn, $sql3)) {
        echo "Team registation success";
    } else {
        echo "Team registation fail: " . mysqli_error($conn);
    }

    
    if (move_uploaded_file($tempname1,$folder1)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
    

}

mysqli_close($conn);
?>

<form action="" method="POST" enctype="multipart/form-data">
    <table border="0">
        <tr>
            <td>Team name</td>
            <td><input type="text" name="tname"></td>
        </tr>
        <tr>
            <td>Owner name</td>
            <td><input type="text" name="oname"></td>
        </tr>
        <tr>
            <td> Icon photo  </td>
            <td><input type="file" name="icon"></td>
        </tr>
    
           
    </table>
    <input type="submit" name="submit" value="SUBMIT">
</form>