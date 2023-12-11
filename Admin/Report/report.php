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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
                    <script>
                    
                        function getPrint(){
                                window.print(); 
                            }
                            
                    </script>
  <title>Report</title>
  <style>
 .navbar{
    display: flex;
    align-items: center;
    padding: 20px;
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

.header{
    background: radial-gradient(#fff,#5960de);
    height: 170vh;
}

.btn{
    display: block;
    background: #ff523b;
    
    padding: 8px 30px;
    margin: auto;
    border-radius: 30px;
    transition: background 0.5s;
}

.btn:hover{
    background: #5960de;
}

    
    </style>

</head>

<body>
 <div class="header">
<div class="navbar">
<img src="/LPL_PROJECT/LPL_PROJECT/images/lpllogo.png" width="125px" >

  <nav>
<ul>
    <li><i class="fa-solid fa-laptop"></i><a href="">Dashboard</a></li>
    <li><i class="fa-solid fa-right-from-bracket"></i><a href="">Log Out</a></li>
</ul>
</nav>

</div>
        <div class="container">
                <div id= player>
                            <h3>Number of Players of each Country</h3>
                            <br>
                        <table class="table table-hover text-center "style=" width:100%">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Country Name</th>
                                                <th>Number Of Players</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            session_start();

                                            include("conn.php");
                                            mysqli_select_db($conn, "lplsystem");


                                            if (isset($_SESSION['admin_id'])) {

                                            $sql='SELECT country, COUNT(*) AS Numbers
                                            FROM register
                                            GROUP BY country;
                                            ';

                                            $result = mysqli_query($conn, $sql);
                                            while($row=mysqli_fetch_assoc($result)){
                                                $num = $row['Numbers'];
                                            $country  = $row['country'];
                                            ?>

                                            <tr>
                                                    <td><?php echo $country?></td>
                                                    <td><?php echo  $num?></td>
                                                </tr>
                                                <?php
                                            }?>
                                        </tbody>
                        </table>
                    </div>

                    <br>
                <div>
                    
                
                            <h3>Top 10 valuable Batsmans</h3>
                            <br>

                            <table class="table table-hover text-center "style=" width:100%">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Player Name</th>
                                              
                                                <th>Country</th>
                                                <th>Sold Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

$sql = 'SELECT register.first_name, register.last_name, register.catogary, register.country, sold   FROM register
        LEFT JOIN batsman ON register.player_id = batsman.player_batting_id WHERE sold IS NOT NULL ORDER BY sold DESC LIMIT 10' ;

                                             /*$sql='SELECT first_name,last_name,country,sold,catogary FROM register, ;
                                             ';*/

                                            $result = mysqli_query($conn, $sql);
                                            while($row=mysqli_fetch_assoc($result)){
                                                $fname = $row['first_name'];
                                                $lname = $row['last_name'];
                                                $country = $row['country'];
                                                $sold = $row['sold'];
                                            ?>

                                            <tr>
                                                    <td><?php echo $fname." ".$lname?></td>
                                                    <td><?php echo  $country?></td>
                                                   
                                                    <td><?php echo  $sold?></td>
                                                </tr>
                                                <?php
                                            }?>
                                        </tbody>
                        </table>
                </div>

            
                
                <br>
    

                <div>
                    
                
                    <h3>Top 10 valuable Bowlers</h3>
                    <br>

                    <table class="table table-hover text-center "style=" width:100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Player Name</th>
                                        <th>Country</th>
                                        <th>Sold Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

$sql = 'SELECT register.first_name, register.last_name, register.catogary, register.country, sold   FROM register
LEFT JOIN bowler ON register.player_id = bowler.player_bowlling_id WHERE sold IS NOT NULL ORDER BY sold DESC LIMIT 10' ;

                                     /*$sql='SELECT first_name,last_name,country,sold,catogary FROM register, ;
                                     ';*/

                                    $result = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $fname = $row['first_name'];
                                        $lname = $row['last_name'];
                                        $country = $row['country'];
                                        $sold = $row['sold'];
                                    ?>

                                    <tr>
                                            <td><?php echo $fname." ".$lname?></td>
                                            <td><?php echo  $country?></td>
                                            <td><?php echo  $sold?></td>
                                        </tr>
                                        <?php
                                    }?>
                                </tbody>
                </table>
        </div>

<br>
        <div>
                    
                
                    <h3>Top 10 valuable Wicketkeepers</h3>
                    <br>

                    <table class="table table-hover text-center "style=" width:100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Player Name</th>
                                        <th>Country</th>
                                        <th>Sold Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

$sql = 'SELECT register.first_name, register.last_name, register.catogary, register.country, sold   FROM register
LEFT JOIN wicketkeeper ON register.player_id = wicketkeeper.player_keeping_id WHERE sold IS NOT NULL ORDER BY sold DESC LIMIT 10' ;

                                     /*$sql='SELECT first_name,last_name,country,sold,catogary FROM register, ;
                                     ';*/

                                    $result = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $fname = $row['first_name'];
                                        $lname = $row['last_name'];
                                        $country = $row['country'];
                                        $sold = $row['sold'];
                                    ?>

                                    <tr>
                                            <td><?php echo $fname." ".$lname?></td>
                                            <td><?php echo  $country?></td>
                                            <td><?php echo  $sold?></td>
                                        </tr>
                                        <?php
                                    }?>
                                </tbody>
                </table>
        </div>
<br>


        <div>
                    
                
                    <h3>Top 10 valuable Allrounders</h3>
                    <br>

                    <table class="table table-hover text-center "style=" width:100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Player Name</th>
                                        <th>Country</th>
                                        <th>Sold Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

$sql = 'SELECT register.first_name, register.last_name, register.catogary, register.country, sold   FROM register
LEFT JOIN allrounder ON register.player_id = allrounder.player_al_id WHERE sold IS NOT NULL ORDER BY sold DESC LIMIT 10' ;

                                     /*$sql='SELECT first_name,last_name,country,sold,catogary FROM register, ;
                                     ';*/

                                    $result = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $fname = $row['first_name'];
                                        $lname = $row['last_name'];
                                        $country = $row['country'];
                                        $sold = $row['sold'];
                                    ?>

                                    <tr>
                                            <td><?php echo $fname." ".$lname?></td>
                                            <td><?php echo  $country?></td>
                                            <td><?php echo  $sold?></td>
                                        </tr>
                                        <?php
                                    }?>
                                </tbody>
                </table>
        </div>

        </div>
        <br><br>
        <button onclick="getPrint()" class="btn">Download</button>

    </body>

        <?php


        } else {
            header("Location: /LPL_PROJECT/LPL_PROJECT/Admin/logout.php");
        }


        ?>
