<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        // Replace the static data with your dynamic data
        var dynamicData = [
          ['Year', 'Sold Price'],
          <?php

          session_start();
          include "conn.php";
          mysqli_select_db($conn, "lplsystem");
          $player_id = $_SESSION['user_id'];

            // Replace 'your_table' with your actual table name
            $query = "SELECT sold_price, year FROM data WHERE player_id = $player_id ORDER BY year";

            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
              echo "['" . $row['year'] . "', " . $row['sold_price'] . "],";
            }

            mysqli_close($conn);
          ?>
        ];

        var data = google.visualization.arrayToDataTable(dynamicData);

        var options = {
          title: 'Your Sold Prices by Year',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 60%;"></div>
  </body>
</html>
