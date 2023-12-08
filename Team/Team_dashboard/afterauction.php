<?php 

// Include your database connection or any necessary setup here
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$sql = "SELECT player_id FROM auction ORDER BY auction_id DESC LIMIT 1";



$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $player_id= $row["player_id"];
    echo $player_id."<br>";

    
}
        $Catogary= "SELECT catogary,first_name,last_name,profile_photo FROM register WHERE player_id=$player_id";
        $CatogaryRsult=mysqli_query($conn, $Catogary);
        
        
        if (mysqli_num_rows($CatogaryRsult) > 0) {
            while ($row4 = mysqli_fetch_assoc($CatogaryRsult)) {
                $PlayerCatogary= $row4["catogary"];
                $first_name= $row4["first_name"];
                $last_name= $row4["last_name"];
                $profile_photo= $row4["profile_photo"];


            }

            
    }

    $bidDetails = "SELECT team_id, bid_price FROM bid WHERE player_id = $player_id ORDER BY bid_id DESC LIMIT 1";

    $BidRsult=mysqli_query($conn, $bidDetails);
    
    
    if (mysqli_num_rows($BidRsult) > 0) {
        while ($row4 = mysqli_fetch_assoc($BidRsult)) {
            
            $team_id= $row4["team_id"];
            $bid_price= $row4["bid_price"];
            }
    }
    else{
        $bid_price=0;
        $team_id="No bid for You";
    }

    
echo "$team_id"."<br>";
echo"$PlayerCatogary"."<br>";
echo $first_name." ".$last_name."<br>";
echo "$profile_photo"."<br>";
echo $bid_price."<br>";
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>After Auction</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  

<script>
    $(document).ready(function() {
        function checkForNewRecords() {
            $.ajax({
                url: 'newrecord.php', // Replace with the actual path to your PHP script
                method: 'GET',
                dataType: 'json', // Specify the expected data type
                success: function(response) {
                    if (response.player_id) {
                        alert('New record inserted! Player ID: ' + response.player_id);
                        window.location.href = 'auction.php'; 

                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        // Call the function at regular intervals
        setInterval(checkForNewRecords, 5000); // Check every 5 seconds
    });
</script>


</head>
<body>
    <!-- Your page content goes here -->
</body>
</html>
