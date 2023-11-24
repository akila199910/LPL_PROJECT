<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body >
    
        <?php
            include "./adminHeader.php";
            include "./sidebar.php";
           
            include "conn.php";
            mysqli_select_db($conn,"lplsystem");
        ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-4">
                <a href="Addmoderator/indexmodertor.php">
                <div class="card"  >
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Moderators</h4>
                    <h5 style="color:white;">
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
                    ?></h5>
                </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="Playerlist/registered.php">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Registered Players</h4>
                    <h5 style="color:white;">
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
                   ?>
                   </h5>
                </div>
                </a>
            </div>

            <div class="col-sm-4">
                <a href="Rule/rule.php">
                    <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Rules</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       /*$sql="SELECT * from rule";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                  */ ?>
                   </h5>
                </div>
                    </a>
            </div>

            <div class="col-sm-3">
            <a href="Playerlist/batsmanlist.php">
                <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Batsmen</h4>
                    <h5 style="color:white;">
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
                   ?>
                   </h5>
                </div>
                    </a>
            </div>

            <div class="col-sm-3">
            <a href="Playerlist/bowlerlist.php">

            <div class="card" >
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Bowlers</h4>
                    <h5 style="color:white;">
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
                   ?>
                   </h5>
                </div>
                    </a>
            </div>

            <div class="col-sm-3">
            <a href="Playerlist/allrounderlist.php">

            <div class="card" >
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Allrounder</h4>
                    <h5 style="color:white;">
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
                   ?>
                   </h5>
                </div>
                    </a>
            </div>

            <div class="col-sm-3">
            <a href="Playerlist/wicketkeeperlist.php">

                <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">WicketKeeper</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from wicketkeeper where Sold IS NULL";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                       
                   ?>
                   </h5>
                </div>
                    </a>
            </div>
        </div>
        
    </div>
       
            
        
    

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>