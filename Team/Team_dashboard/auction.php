<?php
session_start();
$team_id=$_SESSION['team_id'];
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$playersql="SELECT player_id FROM auction WHERE active=0";
$idResult=mysqli_query($conn, $playersql);

if (mysqli_num_rows($idResult) > 0) {
    while ($row3 = mysqli_fetch_assoc($idResult)) {
        $player_id= $row3["player_id"];
        //echo  $player_id."<br>";


        $Catogary= "SELECT catogary FROM register WHERE player_id=$player_id";
        $CatogaryRsult=mysqli_query($conn, $Catogary);
        
        
        if (mysqli_num_rows($CatogaryRsult) > 0) {
            while ($row4 = mysqli_fetch_assoc($CatogaryRsult)) {
                $PlayerCatogary= $row4["catogary"];
            }
            switch ($PlayerCatogary) {
                case 'BATSMAN':
                    
                    $page="batsmancontain.php";
                    break;
                   
        
                case 'BOWLER':
                   
                    $page="bowlercontain.php";
                    break;
        
                case 'WICKETKEEPER':
                    
                    $page="wicketkeepercontain.php";
                   
                    break;
        
                case 'ALLROUNDER':
                  
                    
                    $page="allroundercontain.php";
                    
                    break;
        
                default:
                    break;
            }
            //echo   $PlayerCatogary;
            //echo $page;

        }


    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Include jQuery -->
    <script>
        $(document).ready(function() {
            // Function to check time difference
            function checkTimeDifference() {
                $.ajax({
                    url: 'check_auction.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.timeDifference <= -2) {
                            
                            window.location.href = 'afterauction.php'; 
                        }
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            }

            checkTimeDifference();

           
            setInterval(checkTimeDifference, 1000);
            
        });
    </script>
    <style>
        .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

   
    .ntext1 {
      font-size: 1.5rem;
      font-weight: bold;
      color: #c87a7a;
    }
    .ntext2 {
      font-size: 1.5rem;
      font-weight: bold;
      color: #ce4a4a;
    }
    .ntext3 {
      font-size: 1.5rem;
      font-weight: bold;
      color: #ce5b;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Auction</title>
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div style="font-size: 15px; color: red;">
      Available Credit<br>
      <span class="ntext1">$30000</span>
    </div>

    <div class="d-flex align-items-center">

    <form class="form-inline" id="bidForm" method="post">
    <input class="form-control mr-sm-2" type="number" placeholder="Place Your Bid" id="bid_price" name="bid_price">

    <input class="form-control mr-sm-2" type="hidden" id="team_id" name="team_id" value="<?php echo $team_id?>">
    <input class="form-control mr-sm-2" type="hidden" id="player_id" name="player_id" value="<?php echo $player_id?>">
    

    <button class="btn btn-primary my-2 my-sm-0" type="button" id="submitBid" name="submitBid">Submit</button>
</form>
    </div>

    <span class="ntext3"><?php/* echo strtoupper($playerName)*/ ?></span>

    <div style="font-size: 15px; color: rgb(179, 255, 0);">
      Highest Bid<br>
      <span class="ntext2">3000</span>
    </div>
  </div>
</nav>

<div class="div"></div>

         <div id="bid"></div>
    <p id="countdown"></p>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function(){
        var player_id = <?php echo json_encode($player_id); ?>;
        var url = <?php echo json_encode($page); ?>;

        $.ajax({
            type: "POST",
            url: url,
            data: { player_id: player_id },
            success: function(data) {
                $(".div").html(data);
            }
        });

        setInterval(function () {
            $("#countdown").load("time.php");
            $("#bid").load("bid.php");
        }, 1000);        

    $("#submitBid").click(function () {
        

        let bid_price =$("#bid_price").val();
        let team_id =$("#team_id").val();
        let player_id =$("#player_id").val();

        $.ajax({
        type: "POST",
        url: "formsubmit.php",
        data: {
                bid_price:bid_price,
              team_id:team_id,
              player_id:player_id
        },
        cache:false,
        
        error:function(xhr,status,error){
            console.error(xhr);
        }

    });
        
});
});

 
</script>
</body>
</html>

