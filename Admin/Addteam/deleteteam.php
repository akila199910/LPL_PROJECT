<?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");
$id = $_GET["id"];
$sql = "DELETE FROM team WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: indexteam.php?msg=Team deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
