<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

//මේකට ඕනි ටේබල් එක හැදෙන්න වෙන්නෙ ඇඩ්මින් Auction Date එක Announce කරද්දි ඒ බටන් එකට දාන්න වෙන්නෙ. මොකද වෙන මේ ටේබල් එක හැදෙන්න වෙලාවක් නෑ
// එහෙම නැත්නම් Auction එක ස්ටාර්ට් කරන බටන් එකට දා ගනින්

//make Id by Desending order and get only one raw
$sql1 = "SELECT * FROM playersregistation ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql1);

if ($row = mysqli_fetch_assoc($result)) {

    //මෙතන වයිල් ලූප් එකක්ම ඕනි නෑ ඕනි නම් වෙන මොකක් හරි ගහ ගනින්, මොකද එක ඩේට එකයිනෙ ගන්නේ.
   
        echo '<table border="0">';
        echo '<tr>';
        echo '<td colspan="2"><img src="http://localhost/Register/pic/' . $row["profilepic"] . '" alt="player profile picture" width="100%" height="100%"></td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td>' . $row["f_name"] . ' ' . $row["l_name"] . '</td>';
        echo '<td>Base Price 10000$</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td>' . $row["country"] . '</td>';
        echo '</tr>';

        echo '<tr>';
            echo '<td>';
            if ($row["catogary"] == "bat") {
                echo "Batsman";
            } else if ($row["catogary"] == "bol") {
            echo "Bowler ";
            } else if ($row["catogary"] == "wk") {
            echo "Wicket Keeper";
            } else {
            echo "All Rounder";
            }
            '</td>';

        echo '<td>';
        if ($row["level"] == "yes") {
            echo "International Player";
        } else {
            echo "New Player LpL";
        }
        '</td>';
        echo '</tr>';


        echo '<tr>';
        echo '<td colspan="2"> <h2>[Basic Stat Placed Here]</h2></td>';
        echo '</tr>';


        
        echo '</table>';



    }

    
 else {
    echo "No Auction Right Now. Please Come Back Later" . mysqli_error($conn);
}


$sql2 = "SELECT * FROM price ORDER BY bid_price DESC";
$result2 = mysqli_query($conn, $sql2);

if ($row3 = mysqli_fetch_assoc($result2)) {

    echo '<table border="0">';
    echo '<tr>';
    echo '<td><h1>' . $row3["team_name"] .'</h1></td>';
    echo '<td><h1>' . $row3["bid_price"] . '$</h1></td>';
    echo '</tr>';

    while ($row2 = mysqli_fetch_assoc($result2)) {
        echo '<tr>';
        echo '<td>' . $row2["team_name"] .'</td>';
        echo '<td>' . $row2["bid_price"] . '</td>';
        echo '</tr>';   
    }
    echo '</table>';
} else {
    echo "No Auction Right Now. Please Come Back Later" . mysqli_error($conn);
}

mysqli_close($conn);
?>