
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv="refresh" content="1">-->
    <title>Dynamic Bar Graph</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- HTML canvas element to render the bar graph -->
<canvas id="myBarChart" width="400" height="200"></canvas>

<?php

include("conn.php");
mysqli_select_db($conn, "lplsystem");

// Query to get the latest player_id from the auction table
$sql = "SELECT player_id FROM auction ORDER BY auction_id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $player_id = $row["player_id"];

    // Query to get the maximum bid_price for each team_id
    $sqlb = "SELECT team_id, MAX(bid_price) AS max_bid_price FROM bid WHERE player_id=$player_id GROUP BY team_id";
    $resultb = $conn->query($sqlb);

    // Check for errors in the query
    if (!$resultb) {
        die("Query failed: " . $conn->error);
    }

    // Check if there are results
    if ($resultb->num_rows > 0) {
        // Fetch data and format it for JavaScript
        $data = [];
        while ($rowb = $resultb->fetch_assoc()) {
            $data[] = ['label' => $rowb['team_id'], 'value' => $rowb['max_bid_price']];
        }

        // Encode data to JSON for JavaScript
        $jsonData = json_encode($data);
    }
} else {
    // No player in the auction table, handle it accordingly
    $jsonData = json_encode([]); // Empty data for the graph
}

// Close the connection
$conn->close();
?>



<!-- JavaScript to render the dynamic bar graph -->
<script>
    // Get the data from PHP
    var jsonData = <?php echo $jsonData; ?>;

    // Prepare data for Chart.js
    var labels = jsonData.map(function(item) {
        return item.label;
    });

    var data = jsonData.map(function(item) {
        return item.value;
    });

    // Define fixed colors for each bar
    var barColors = ['red', 'blue', 'green', 'orange', 'purple', 'cyan', 'magenta', 'yellow'];

    // Create a bar chart
    var ctx = document.getElementById('myBarChart').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '',
                data: data,
                backgroundColor: barColors, // Use the predefined colors
                borderColor: barColors.map(color => color + 'FF'), // Add alpha channel for border color
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            animation: {
                duration: 0 // Set the animation duration to 0 to disable it
            }
        }
    });
</script>




</body>
</html>

