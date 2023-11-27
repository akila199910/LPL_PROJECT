

<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_POST['teamSelect'])) {
    $teamId = $_POST['teamSelect'];

    //echo $teamId;

    $sql="SELECT player_batting_id from batsman where team_id =$teamId";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        echo $row['player_batting_id'] ."<br>";
    }

}
?>
