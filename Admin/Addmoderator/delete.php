<?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");



//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {
  
  //delete code
  $id = $_GET["id"];
  $sql = "DELETE FROM moderators WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  
  if ($result) {
    header("Location: indexmodertor.php?msg=Moderator deleted successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }

  
} else {
    header("Location: /LPL_PROJECT/LPL_PROJECT/Admin/logout.php");
}





?>