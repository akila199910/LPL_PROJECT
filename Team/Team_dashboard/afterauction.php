<?php 

// Include your database connection or any necessary setup here
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$sql = "SELECT player_id FROM auction ORDER BY auction_id DESC LIMIT 1";


$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $player_id= $row["player_id"];
    echo $player_id;

    
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

            if($PlayerCatogary=="BATSMAN"){
                $TeamId="SELECT team_id,sold FROM batsman WHERE player_batting_id=$player_id";
                $TeamIdResult=mysqli_query($conn,$TeamId);
                if (mysqli_num_rows($TeamIdResult) > 0) {
                    while ($row1 = mysqli_fetch_assoc($TeamIdResult)) {
                        $team_id= $row1['team_id'];
                        $soldPrice = $row1['sold'];
                    }
                }
                if(!isset($team_id)){
                    $team_id= 'NO TEAM ID';
                    $soldPrice='UNSOLD';
                }
            }
        
            if($PlayerCatogary=="BOWLER"){
                $TeamId="SELECT team_id,sold FROM bowler WHERE player_bowlling_id=$player_id";
                $TeamIdResult=mysqli_query($conn,$TeamId);
                if (mysqli_num_rows($TeamIdResult) > 0) {
                    while ($row1 = mysqli_fetch_assoc($TeamIdResult)) {
                        $team_id= $row1['team_id'];
                        $soldPrice = $row1['sold'];
                    }
                }
                if(!isset($team_id)){
                    $team_id= 'NO TEAM ID';
                    $soldPrice='UNSOLD';
                }
            }
            if($PlayerCatogary=="ALLROUNDER"){
                $TeamId="SELECT team_id,sold FROM allrounder WHERE player_al_id=$player_id";
                $TeamIdResult=mysqli_query($conn,$TeamId);
                if (mysqli_num_rows($TeamIdResult) > 0) {
                    while ($row1 = mysqli_fetch_assoc($TeamIdResult)) {
                        $team_id= $row1['team_id'];
                        $soldPrice = $row1['sold'];
                    }
                }
                if(!isset($team_id)){
                    $team_id= 'NO TEAM ID';
                    $soldPrice='UNSOLD';
                }
            }
            if($PlayerCatogary=="WICKETKEEPER"){
                $TeamId="SELECT team_id,sold FROM wicketkeeper WHERE player_keeping_id=$player_id";
                $TeamIdResult=mysqli_query($conn,$TeamId);
                if (mysqli_num_rows($TeamIdResult) > 0) {
                    while ($row1 = mysqli_fetch_assoc($TeamIdResult)) {
                        $team_id= $row1['team_id'];
                        $soldPrice = $row1['sold'];
                    }
                }
                if(!isset($team_id)){
                    $team_id= 'NO TEAM ID';
                    $soldPrice='UNSOLD';
                }
            }
    }



    

    
echo "$team_id";
echo $soldPrice;
echo"$PlayerCatogary";
echo $first_name." ".$last_name;
echo "$profile_photo";
    

?>


