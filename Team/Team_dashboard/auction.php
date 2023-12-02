<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$playersql="SELECT player_id FROM auction WHERE active=0";
$idResult=mysqli_query($conn, $playersql);

if (mysqli_num_rows($idResult) > 0) {
    while ($row3 = mysqli_fetch_assoc($idResult)) {
        $player_id= $row3["player_id"];
        echo  $player_id."<br>";


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
                    // Handle other cases if needed
                    break;
            }
            echo   $PlayerCatogary;
            echo $page;

        }


    }
} else {
    echo "Please wait ";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Auction</title>
</head>
<body>
    <div class="div"></div>
<script>
            $(document).ready(function(){
              
                var player_id = <?php echo $player_id; ?>;
                var url = "<?php echo $page; ?>";
                $.ajax({
            type: "POST",
            url: url,
            data: { player_id: player_id },
            success: function(data) {
                $(".div").html(data);
            }
        });
    });
</script>

</body>
</html>
