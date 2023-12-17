<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");
session_start();

if (isset($_SESSION['team_id'])) {
   // echo $_SESSION['team_id'];
   $team_id =$_SESSION['team_id'];

} else {
    header("Location:logout.php");
    exit; // Make sure to exit after redirect
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team dashboard</title>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Bootstrap -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        

        .size {
              width: 200px;
              height: 200px;
          }
          .btn-margin {
            margin-bottom: 15px;
        }

        .header{
    background: radial-gradient(#fff,#5960de);
    height: 100%;
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
        
    </style>
</head>
<body>
<div class="header">
<div class="navbar row">
        <div class="logo col-4" >
           <img src="../../images/lpllogo.png" width="125px"> 
        </div>

        <div class="col-8" style="color: #fff; font-size:20px;">   LPL - LANKA PREMIER LEAGUE</div>
        </nav>
       
    </div>
    <br><br><br><br>
    <h1 style="text-align:center;">Team dashboard</h1>

    <?php

        include("sidebar.php");
?>


<div class="content">
   
    <!-- Add your main content here -->

        <div class="container">
            <?php
           
            include "conn.php";
            mysqli_select_db($conn,"lplsystem");
        ?>
           
           <div class="row">
              <div class="col-lg-3">
      
            <a href="auction.php"><button type="button" class="btn btn-dark size btn-margin">LIVE AUCTION !!<br>
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
           </div>
      
           <div class="col-lg-3">
          <a href="../playerlist/teammember.php"><button type="button" class="btn btn-info size btn-margin">OUR TEAM MEMBERS<br>
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
                         </div>
          <div class="col-lg-3">
          <a href="../Playerlist/registered.php"><button type="button" class="btn btn-success size btn-margin">Registered Players<br>
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
                         </div>
                         
      
      
          <div class="col-lg-3">
          <a href="../playerlist/teambidrules.php"><button type="button" class="btn btn-primary size btn-margin">Rules<br>
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
                        </div>
                        </div>
      
      
      
      <div class="row">
              <div class="col-lg-3">
          <a href="../playerlist/batsmanlist.php"><button type="button" class="btn btn-secondary size btn-margin">Batsman<br>
      
          <?php
                             
                             $sql5 = "SELECT * FROM batsman 
                                      WHERE sold IS NULL AND gotoauction IS NULL";
                             $result=$conn-> query($sql5);
                             $count=0;
                             if ($result-> num_rows > 0){
                                 while ($row=$result-> fetch_assoc()) {
                         
                                     $count=$count+1;
                                 }
                             }
                             echo $count;
                         ?></button></a>
                         </div>
      
      
      <div class="col-lg-3">
          <a href="../playerlist/bowlerlist.php"><button type="button" class="btn btn-secondary size btn-margin">Bowlers<br>
          <?php
                             $sql5 = "SELECT * FROM bowler 
                             WHERE sold IS NULL AND gotoauction IS NULL";
                             $result=$conn-> query($sql5);
                             $count=0;
                             if ($result-> num_rows > 0){
                                 while ($row=$result-> fetch_assoc()) {
                         
                                     $count=$count+1;
                                 }
                             }
                             echo $count;
                         ?></button></a>
                         </div>
      
      
      <div class="col-lg-3">
          <a href="../playerlist/allrounderlist.php"><button type="button" class="btn btn-secondary size btn-margin">Allrounder<br>
          <?php
                             $sql5 = "SELECT * FROM allrounder 
                             WHERE sold IS NULL AND gotoauction IS NULL";
                             
                             $result=$conn-> query($sql5);
                             $count=0;
                             if ($result-> num_rows > 0){
                                 while ($row=$result-> fetch_assoc()) {
                         
                                     $count=$count+1;
                                 }
                             }
                             echo $count;
                         ?></button></a>
                         </div>
      <div class="col-lg-3">
            <a href="../playerlist/wicketkeeperlist.php"><button type="button" class="btn btn-secondary size btn-margin" >WicketKeeper<br>
            <?php
      
      $sql5 = "SELECT * FROM wicketkeeper 
      WHERE sold IS NULL AND gotoauction IS NULL";
      
                             $result=$conn-> query($sql5);
                             $count=0;
                             if ($result-> num_rows > 0){
                                 while ($row=$result-> fetch_assoc()) {
                         
                                     $count=$count+1;
                                 }
                             }
                             echo $count;
                             
                         ?></button></a>
                         </div>
                         </div>
      
      
    <div class="row">
      
      <div class="col-lg-3">
      
          <a href="../Playerlist/teamplayers.php"><button type="button" class="btn btn-warning size btn-margin">Team Players<br>
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
                       </div>


                        
                       <div class="col-lg-3">
      
          <a href="../Playerlist/mycontract.php"><button type="button" class="btn btn-warning size btn-margin">Contract List<br>
          <?php
                           
                             $sql= "SELECT r.*, b.sold AS batsman_sold, b.gotoauction AS batsman_gotoauction,
                             bo.sold AS bowler_sold, bo.gotoauction AS bowler_gotoauction,
                             wk.sold AS wicketkeeper_sold, wk.gotoauction AS wicketkeeper_gotoauction,
                             alr.sold AS allrounder_sold, alr.gotoauction AS allrounder_gotoauction
                             FROM register r
                             LEFT JOIN batsman b ON r.player_id = b.player_batting_id
                             LEFT JOIN bowler bo ON r.player_id = bo.player_bowlling_id 
                             LEFT JOIN wicketkeeper wk ON r.player_id = wk.player_keeping_id 
                             LEFT JOIN allrounder alr ON r.player_id = alr.player_al_id 
                             WHERE (b.sold IS NOT  NULL AND b.gotoauction = 0 AND b.team_id=$team_id )
                             OR (bo.sold IS  NOT NULL AND bo.gotoauction = 0 AND bo.team_id=$team_id)
                             OR (wk.sold IS  NOT NULL AND wk.gotoauction = 0 AND wk.team_id=$team_id)
                             OR (alr.sold IS  NOT NULL AND alr.gotoauction = 0 AND alr.team_id=$team_id)";         
                                         
                             $result=$conn-> query($sql);
                             $count=0;
                             if ($result-> num_rows > 0){
                                 while ($row=$result-> fetch_assoc()) {
                         
                                     $count=$count+1;
                                 }
                             }
                             echo $count;
                             
                         ?></button></a>
                       </div>

                       </div>
      
      
      
      
                  
                  
                  
              
          
      
          <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
          <script type="text/javascript" src="./assets/js/script.js"></script>
          <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      
          </div>
          </div>
</body>
</html>
