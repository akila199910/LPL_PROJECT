<?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");



//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {

} else {
    header("Location: /LPL_PROJECT/LPL_PROJECT/Admin/logout.php");
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
<?php

include('../sidebar.php');
?>


  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;">
    LPL - LANKA PREMIER LEAGUE
  </nav>
  <div class="content">
  

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add-team.php" class="btn btn-dark mb-3">ADD TEAM</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr> 
          <th scope="col">Icon</th>
          <th scope="col">Team Name</th>
          <th scope="col">Owner Name</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM team";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
          <td>
                            <?php
                            $photoPath = "teamicon/" . $row['icon'];
                            echo "<img src='$photoPath' alt='icon' style='width: 70px; height: 70px;'>";
                            ?>
                        </td>
            
            <td><?php echo $row["team_name"] ?></td>
            <td><?php echo $row["owner_name"] ?></td>
            <td><?php echo $row["email"] ?></td>
            
            <td>
              <a href="editteam.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="deleteteam.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </div>
</body>

</html>