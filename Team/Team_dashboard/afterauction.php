<?php 

// Include your database connection or any necessary setup here
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$sql = "SELECT player_id FROM auction ORDER BY auction_id DESC LIMIT 1";



$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $player_id= $row["player_id"];
   
   
    
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

    if ($bid_price > 0) {
        echo '
        <div class="winer"><div class="win-container">
            <div class="box">
                <h2>Congratulations!</h2>
                <h3>You have won the bid</h3>';
                echo "Player ID ".$player_id."<br><br><h3>";
                echo $first_name." ".$last_name."</h3><br> <br>";
                echo '<img src="../../Register/Img/proimg/' . $profile_photo . '" alt="Profile Picture" width="150px" height="150px">';
               
    
                echo '<p>Team ID: ' . $team_id . '</p>
                <p style="font-size: 25px;">' . $PlayerCatogary . '</p>
                <p><b>Bid Price: ' . $bid_price . '<b></p>
            </div>
        </div>
        <div>';
    }
    

    


    else {
        echo '<div class="lost-container">
                <div class="box">
                    Player ID ' . $player_id . '<br><h3>' .
                    $first_name . ' ' . $last_name . '</h3><br><br>' .
                    '<img src="../../Register/Img/proimg/' . $profile_photo . '" alt="Profile Picture" width="150px" height="150px">
                    <p style="font-size: 25px;">' . $PlayerCatogary . '</p>
                    <h4>Sorry <br>you are not sold</h4>
                    <img src="Sad.png" alt="Girl in a jacket" width="60" height="60"> 
                    <p style="font-size: 30px;">Try again next round.</p>
                </div>
            </div>';
    }
    
     

    


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


<style>

h2 {
	
	font-size: 50px;
	font-family: 'Sigmar One', cursive;
	
}

h4 {
	
	font-size: 50px;
	font-family: 'Sigmar One', cursive;
	
}


.win-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url('win.gif'); 
    background-size: cover; /* Ensuring the image covers the container */
    background-position: center; /* Centering the image */
}



.box {
    text-align: center;
    padding: 20px;
    background-color: rgba(255, 255, 245, 0.8); /* Adding a semi-transparent background color */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    max-width: 80%;
}


.lost-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #c7e0de; 
    background-size: cover; /* Ensuring the image covers the container */
    background-position: center; /* Centering the image */
}

.winer{
    background-color: #c7e0de; 

}



</style>


</head>

</html>
