<?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");

$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $team_name = $_POST['team_name'];
  $owner_name = $_POST['owner_name'];
  $email = $_POST['email'];
  $password=$_POST['password'];
  $filename1 = $_FILES['icon']['name'];
$tempname1 = $_FILES['icon']['tmp_name'];
$folder1 = "./icon/" . $filename1;
move_uploaded_file($tempname1,$folder1);
 

  $sql = "UPDATE team SET team_name='$team_name',owner_name='$owner_name',email='$email',password='$password',icon='$icon' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Team updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>ADD TEAM</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;">
  LPL - LANKA PREMIER LEAGUE
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Team Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM team WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data>
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Team Name:</label>
            <input type="text" class="form-control" name="team_name" value="<?php echo $row['team_name'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Owner Name:</label>
            <input type="text" class="form-control" name="owner_name" value="<?php echo $row['owner_name'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Icon Photo:</label>
          <input type="file" class="form-control" name="icon" value="<?php echo $row['icon'] ?>">
        </div>
        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>