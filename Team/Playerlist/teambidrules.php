
<?php
include("navbar.php");
include("home.php");
include("conn.php");
mysqli_select_db($conn, "lplsystem");


$sql="SELECT * from rule ";
              $result=$conn-> query($sql);

              if (!$result) {
                die("Error in SQL2: " . mysqli_error($conn));
            }
            
            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                while ($row2 = mysqli_fetch_assoc($result)) {
                    $date =$row2["start"];
                    $local = $row2["no_local_players"];
                    $foreign=  $row2["no_foering_players"];
                    $bidmoney =$row2["total_amount_of_bid"];
                    $conmoney =  $row2["total_amount_of_contract"];
                    $time =  $row2["auction_duration_time"];
                   
                }
            } else {
                echo "No matching data found for player ID: $player_id<br>";
            }


//Auto logout without session
session_start();

//if (isset($_SESSION['team_id'])) {
   
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Auction</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
    
    
    tr{
        margin-bottom:50px;
    }
    .header{
    background: radial-gradient(#fff,#5960de);
    height: 500vh;
}

td{
    padding:20px;
}

.rules{
    position:absolute;
    top:25%;
    left:35%;
    border:3px solid #73AD21;
    padding:10px;
}
h1{
    text-align:center;
}

  </style>
</head>
<div class="header">
<body>


<div class="rules">
    <h1 >BID RULES</h1>

<div >
    <table>
        <tr><td><b>Date</b></td> 
        <td><?php echo "$date"?></td></tr>

        <tr><td><b>Local Players</b></td> 
        <td><?php echo "$local"?></td></tr>

        <tr><td><b>Foreign Players</b></td> 
        <td><?php echo "$foreign"?></td></tr>

        <tr><td><b>Total amount of money for bid</b></td> 
        <td><?php echo "$bidmoney"?></td></tr>

        <tr><td><b>Total amount of money for contract</b></td> 
        <td><?php echo "$conmoney"?></td></tr>

        <tr><td><b>Auction time duration</b></td> 
        <td><?php echo "$time"?></td></tr>

    </table>
</div>
</div>

    


   
  
</body>
</div>
</html>
