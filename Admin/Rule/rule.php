<?php
        include "conn.php";
        mysqli_select_db($conn,"lplsystem");

        $sql="SELECT * from rule";
        $resultRule = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($resultRule)){
            $auction_year=$row['auction_year'];
            $no_local_players=$row['no_local_players'];
            $no_foering_players=$row['no_foering_players'];
            $total_amount_of_bid=$row['total_amount_of_bid'];
            $total_amount_of_contract=$row['total_amount_of_contract'];
            $auction_duration_time=$row['auction_duration_time'];
            $register_period=$row['register_period'];
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
    <title>Rules and Regulation</title>

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
</head>

<body>
<?php

//include('/LPL_PROJECT/LPL_PROJECT/Admin/sidebar.php');
include('../sidebar.php');

?>
  <div class="content">

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
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
                                            <input class="input--style-5" type="text" name="auction_year" value="<?php echo $auction_year?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Number of local players</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="no_local_players"  value="<?php echo $no_local_players?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Number of foering players</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="no_foering_players" value="<?php echo $no_foering_players?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Total amount of money for bid</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="total_amount_of_bid" value="<?php echo $total_amount_of_bid?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Total amount of money for contract</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="total_amount_of_contract" value="<?php echo $total_amount_of_contract?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Auction duration Time in minute </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="auction_duration_time" value="<?php echo $auction_duration_time?>">
                                </div>
                            </div>
                        </div>
                        <div>
                        <div class="form-row">
                            <div class="name">Number of weeks for register</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="register_period" value="<?php echo $register_period?>">
                                </div>
                            </div>
                        </div>
                    
                        <div>
                             <a href="updaterule.php" class="btn btn--radius-2 btn--green">Update</a>
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
    </div>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->