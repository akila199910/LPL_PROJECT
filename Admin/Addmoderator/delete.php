<?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");

$id = $_GET["id"];
$sql = "DELETE FROM moderators WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Moderator deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
