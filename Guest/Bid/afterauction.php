<?php

// Include your database connection or any necessary setup here
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$sql = "SELECT player_id FROM auction ORDER BY auction_id DESC LIMIT 1";



$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $player_id = $row["player_id"];
}
$Catogary = "SELECT catogary,first_name,last_name,profile_photo FROM register WHERE player_id=$player_id";
$CatogaryRsult = mysqli_query($conn, $Catogary);


if (mysqli_num_rows($CatogaryRsult) > 0) {
    while ($row4 = mysqli_fetch_assoc($CatogaryRsult)) {
        $PlayerCatogary = $row4["catogary"];
        $first_name = $row4["first_name"];
        $last_name = $row4["last_name"];
        $profile_photo = $row4["profile_photo"];
    }
}




$bidDetails = "SELECT team_id, bid_price FROM bid WHERE player_id = $player_id ORDER BY bid_id DESC LIMIT 1";


$BidRsult = mysqli_query($conn, $bidDetails);


if (mysqli_num_rows($BidRsult) > 0) {
    while ($row4 = mysqli_fetch_assoc($BidRsult)) {
        $team_id = $row4["team_id"];
        $bid_price = $row4["bid_price"];
    }

    // Corrected team name query
    $team_name = "SELECT team_name FROM team WHERE id = $team_id";
    $teamrsult = mysqli_query($conn, $team_name);

    if (mysqli_num_rows($teamrsult) > 0) {
        while ($row5 = mysqli_fetch_assoc($teamrsult)) {
            $teamname = $row5["team_name"];
        }
    }
} else {
    $bid_price = 0;
    $team_id = "No bid for You";
}

if ($bid_price > 0) {

    echo '  <div class="win-container">
            <div class="box">
                <h2>Sold Out!</h2>';
    echo "<h1>" . $first_name . " " . $last_name . "</h1><br>";
    echo '<p style="font-size: 30px; font-family: \'Comic Sans MS\', cursive;"> ' . $teamname . "</p><br>";
    echo '<img src="../../Register/Img/proimg/' . $profile_photo . '" alt="Profile Picture" width="150px" height="150px">';
    echo '<p style="font-size: 25px;">' . $PlayerCatogary . '
                <p><b>Bid Price: ' . $bid_price . '<b></p>
                <a href="../../blog%20posts/guesthome.php" class="btn btn-secondary btn-block mt-4">Exit</a>
                
            </div>
            
        </div>
        
        <div>';
} else {
    echo '<div class="lost-container">
                <div class="box">
                <h4>Not sold</h4>
                   <h3>' .
        $first_name . ' ' . $last_name . '</h3><br><br>' .
        '<img src="../../Register/Img/proimg/' . $profile_photo . '" alt="Profile Picture" width="150px" height="150px">
                    <p style="font-size: 25px;">' . $PlayerCatogary . '</p> <br>
                    <a href="../../blog%20posts/guesthome.php" class="btn btn-secondary btn-block mt-4">Exit</a>
                </div>
            </div>';
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            background: radial-gradient(#fff,#5960de);
            background-size: cover;
            /* Ensuring the image covers the container */
            background-position: center;
            /* Centering the image */
        }



        .box {
            text-align: center;
            padding: 60px;
            background-color: rgba(255, 255, 245, 0.8);
            /* Adding a semi-transparent background color */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 80%;
        }


        .lost-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: radial-gradient(#fff,#5960de);
            background-size: cover;
            /* Ensuring the image covers the container */
            background-position: center;
            /* Centering the image */
        }

        
        

        .exit {
            text-align: right;
            /* Aligns text/content to the right */
        }
    </style>


</head>

</html>