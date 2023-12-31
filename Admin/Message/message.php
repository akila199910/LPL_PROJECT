<?php
include "conn.php";
mysqli_select_db($conn,"lplsystem");

session_start();

if (isset($_SESSION['admin_id'])) {
    
  $sql = "SELECT * FROM moderators,chat  ORDER BY chat_id";
  $result = mysqli_query($conn, $sql);
} else {
    header("Location: ../logout.php");
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

  <title>CHAT</title>
  <style>
    .chatRow{
      padding: 10px;
      
    }

    .navbar {
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: #4169E1;
    z-index: 1000;
    width: 100vw; 
    position: fixed; 
    top: 0; 
    left: 0; 
}


nav{
    flex: 1;
    text-align: right;
}

nav ul{
    display: inline-block;
    list-style-type: none;
}

nav ul li{
    display: inline-block;
    margin-right: 20px;
}

nav ul li i{
    margin-right: 15px;

}

a{
    text-decoration: none;
    color: #555;
}

p{
    color: #fff;
    text-align:center;
}

.header{
    background: radial-gradient(#fff,#5960de);
    height: 500vh;
}


  </style>
</head>

<div class="header">

<body>
<?php

include('sidebar.php');
?>


<div class="navbar row">
        <div class="logo col-4" >
           <img src="../../images/lpllogo.png" width="125px"> 
        </div>

        <div class="col-8" style="color: #fff; font-size:20px;">   LPL - LANKA PREMIER LEAGUE</div>
        </nav>
       
    </div>
    <br><br><br><br>
  
  <div class="content">
    <div class="container">
        <div class="row">
          <div class="col-3">
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Chat</th>
                    </tr>
                </thead>
                <tbody class="table table-hover text-center">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td class="text"><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                            <td>
                                <form action="handle_chat.php" method="POST">
                                    <input type="hidden" name="moderator_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="send" class="btn btn-primary">Chat</button>
                                </form>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
            </div>
            <div class="col-9">

            </div>
        </div>
    </div>
</div>

</body>

</html>