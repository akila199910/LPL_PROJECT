<!DOCTYPE html>
<<<<<<< Updated upstream
<html>
<head>
  <title>Admin</title>
  <head>
  <style>
=======
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
>>>>>>> Stashed changes
          .size {
              width: 200px;
              height: 200px;
          }
      </style>
<<<<<<< Updated upstream
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
</head>
<body >
    
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
    LPL - LANKA PREMIER LEAGUE
</nav>
    <div class="container">
      <?php
     
      include "conn.php";
      mysqli_select_db($conn,"lplsystem");
  ?>



<a href="Addmoderator/indexmodertor.php"><button type="button" class="btn btn-primary size">Moderator<br>
=======
     
</head>
<body>

  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: lightblue;width:100%;">
    LPL - LANKA PREMIER LEAGUE
</nav>
    <div class="container">
      <?php
     
      include "conn.php";
      mysqli_select_db($conn,"lplsystem");
  ?>
     


      <a href="Addmoderator/indexmodertor.php"><button type="button" class="btn btn-primary size">Moderator<br>
>>>>>>> Stashed changes
        <?php
                    
        $sql="SELECT * from moderators ";
        $result=$conn-> query($sql);
        $count=0;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
    
                $count=$count+1;
            }
        }
        echo $count;
    ?></button></a>


<a href="Addteam/indexteam.php"><button type="button" class="btn btn-primary size">Teams<br>
<?php
                       
                       $sql="SELECT * from team";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?></button></a>

<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
<a href="Playerlist/registered.php"><button type="button" class="btn btn-primary size">Registered Players<br>
<?php
                       
                       $sql="SELECT * from register";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?></button></a>
<<<<<<< Updated upstream



<a href="Rule/rule.php"><button type="button" class="btn btn-primary size">Rules<br>
<?php
                       
                      /* $sql="SELECT * from register";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                  */ ?></button></a>



<a href="Playerlist/batsmanlist.php"><button type="button" class="btn btn-primary size">Batsman<br>
=======

<a href="Rule/rule.php"><button type="button" class="btn btn-primary size">Rules<br>
        <?php
                    
       /* $sql="SELECT * from moderators ";
        $result=$conn-> query($sql);
        $count=0;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
    
                $count=$count+1;
            }
        }
        echo $count;
    */?></button></a>


<a href="Playerlist/batsmanlist.php"><button type="button" class="btn btn-primary size">Batsmen<br>
>>>>>>> Stashed changes
<?php
                       
                       $sql="SELECT * from batsman where Sold IS NULL";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?></button></a>


<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
<a href="Playerlist/bowlerlist.php"><button type="button" class="btn btn-primary size">Bowlers<br>
<?php
                       
                       $sql="SELECT * from bowler where Sold IS NULL";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?></button></a>


<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
<a href="Playerlist/allrounderlist.php"><button type="button" class="btn btn-primary size">Allrounder<br>
<?php
                       
                       $sql="SELECT * from allrounder where Sold IS NULL";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?></button></a>
<<<<<<< Updated upstream


<a href="Playerlist/wicketkeeperlist.php"><button type="button" class="btn btn-primary size">WicketKeeper<br>
<?php
=======
      
      <a href="Playerlist/wicketkeeperlist.php"><button type="button" class="btn btn-primary size">WicketKeeper<br>
      <?php
>>>>>>> Stashed changes
                       
                       $sql="SELECT * from wicketkeeper where Sold IS NULL";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                       
                   ?></button></a>

<<<<<<< Updated upstream


<a href="Playerlist/rejectplayers.php"><button type="button" class="btn btn-primary size">Reject Players<br>
<?php
=======
        <a href="Playerlist/wicketkeeperlist.php"><button type="button" class="btn btn-primary size">WicketKeeper<br>
        <?php
>>>>>>> Stashed changes
                       
                       $sql="SELECT * from wicketkeeper where Sold IS NULL";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                       
                   ?></button></a>


<<<<<<< Updated upstream


<a href="Playerlist/acceptplayers.php"><button type="button" class="btn btn-primary size">Accept Players<br>
<?php
=======
        <a href="Playerlist/wicketkeeperlist.php"><button type="button" class="btn btn-primary size">WicketKeeper<br>
        <?php
>>>>>>> Stashed changes
                       
                       $sql="SELECT * from wicketkeeper where Sold IS NULL";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                       
                   ?></button></a>
<<<<<<< Updated upstream



<a href="Playerlist/teamplayers.php"><button type="button" class="btn btn-primary size">Team Players<br>
<?php
                  /*     
                       $sql="SELECT * from register WHERE approved='Yes'";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                       
                 */  ?></button></a>



            
            
            
        
    

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
=======
      

    </div>
>>>>>>> Stashed changes
</body>
</html>