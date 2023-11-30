<?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");



//Auto logout without session
session_start();
if (isset($_SESSION['admin_id'])) {
  
  //team delete code
  $id = $_GET["id"];
  $sql = "DELETE FROM team WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  
  if ($result) {
    header("Location: indexteam.php?msg=Team deleted successfully");
  } 
  else {
    echo "Failed: " . mysqli_error($conn);
  }



} 
else {
    header("Location: /LPL_PROJECT/LPL_PROJECT/Admin/logout.php");
}





