<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

$sql = "SELECT f_name, l_name FROM playersregistation";
$result = mysqli_query($conn, $sql);
$datas = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
    }
} else {
    echo "0 results";
}
$count = count($datas);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Auction Buttons</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php
for ($i = 0; $i < $count; $i++) {
    $f_name = $datas[$i]['f_name'];
    echo "<button name='$f_name' class='auction-button'>$f_name</button><br>";
}
?>

<script>
$(document).ready(function() {
    $('.auction-button').click(function() {
        var playerName = $(this).attr('name');
        $.ajax({
            type: "POST",
            url: "auctiontable.php", // The PHP file that handles the insert operation
            data: { f_name: playerName },
            success: function(response) {
                alert(response); // You can display a message based on the response
            }
        });
    });
});
</script>
</body>
</html>

