<?php
        include "conn.php";
        mysqli_select_db($conn,"lplsystem");
    
//Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {
    

    if(isset($_POST['sub'])) {
        $auction_year = $_POST['auction_year'];
        $no_local_players = $_POST['no_local_players'];
        $no_foreign_players = $_POST['no_foering_players'];
        $total_amount_of_bid = $_POST['total_amount_of_bid'];
        $total_amount_of_contract = $_POST['total_amount_of_contract'];
        $auction_duration_time = $_POST['auction_duration_time'];
        $register_period = $_POST['register_period'];
        $start = $_POST['start'];
    
        // Format the date to match the MySQL date format (Y-m-d)
        $formattedStartDate = date('Y-m-d', strtotime($start));
    
        $sqlupdate = "UPDATE rule SET 
            auction_year = $auction_year, 
            no_local_players = $no_local_players, 
            no_foering_players = $no_foreign_players,
            total_amount_of_bid = $total_amount_of_bid, 
            total_amount_of_contract = $total_amount_of_contract, 
            auction_duration_time = $auction_duration_time,
            register_period = $register_period, 
            `start` = '$formattedStartDate'";
    
        mysqli_query($conn, $sqlupdate);
        header("Location: rule.php");
    }
    






} else {
    header("Location: ../logout.php");
}


        

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Reles and Regulation</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <style>
        
        td {
      vertical-align: middle;
    }

    .text {
      text-align: center;
    }


    .size {
      width: 200px;
      height: 200px;
    }

    .btn-margin {
      margin-bottom: 15px;
    }




    .header {
      background: radial-gradient(#fff, #5960de);
      height: 100%;
    }


    .card {
      width: 80%;
      max-width: 3000px;
      color: #fff;
      text-align: center;
      padding: 50px -100px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      background: rgba(255, 255, 255, 0.2);
      border-radius: 16px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(5px);
      margin-left: auto;
      margin-right: 30px;

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
    .navbar {
      display: flex;
      align-items: center;
      padding: 20px;
      background-color: #4169E1;
      justify-content: space-between;
    align-items: center;
    }

    nav {
      flex: 1;
      text-align: right;
    }

    nav ul {
      display: inline-block;
      list-style-type: none;
    }

    nav ul li {
      display: inline-block;
      margin-right: 20px;
    }

    nav ul li i {
      margin-right: 15px;

    }

    a {
      text-decoration: none;
      color: #555;
    }

    p {
      color: #fff;
      text-align: center;
    }

    .col-8 {
    text-align: center;
    margin-right: 600px;
  }
        </style>
       
</head>
<div class="header">

<body>
<?php

//include('/LPL_PROJECT/LPL_PROJECT/Admin/sidebar.php');
include('sidebar.php');

?>

<div class="navbar row">
      <div class="logo col-4">
        <img src="../../images/lpllogo.png" width="125px">
      </div>

      <div class="col-8" style="color: #fff; font-size:20px; text-align: center;"> LPL - LANKA PREMIER LEAGUE</div>
      </nav>

    </div>
    <br><br><br><br><br><br>
  
    
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Rules And Regulations</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-row m-b-55">
                            <div class="name">Year</div>
                            <div class="value">
                                <div class="input-group">
                                            <input class="input--style-5" type="text" name="auction_year">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Number of local players</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="no_local_players">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Number of foering players</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="no_foering_players">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Total amount of money for bid</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="total_amount_of_bid">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Total amount of money for contract</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="total_amount_of_contract">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Auction duration Time in minute </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="auction_duration_time">
                                </div>
                            </div>
                        </div>
                        <div>
                        <div class="form-row">
                            <div class="name">Number of weeks for register</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="register_period">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Auction Start Date</div>
                            <div class="value">
                                <div class="input-group">
                                <input class="input--style-5" type="date" name="start" value="<?php echo $start; ?>">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit" name="sub">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->