<?php
session_start();
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $player_id = isset($_POST['player_id']) ? $_POST['player_id'] : null;

    if ($player_id) {
        // Assuming there is a table called 'batsman' with a column 'based_price'
        $query = "SELECT based_price FROM batsman WHERE player_id = $player_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $based_price = $row['based_price'];

                // Return the based_price as a JSON response
                echo json_encode(['based_price' => $based_price]);
            } else {
                // Handle if no rows are found for the specified player_id
                echo json_encode(['error' => 'No data found for the player_id']);
            }
        } else {
            // Handle database query error
            echo json_encode(['error' => 'Database query error']);
        }
    } else {
        // Handle missing or invalid player_id
        echo json_encode(['error' => 'Invalid player_id']);
    }
} else {
    // Handle invalid request method
    echo json_encode(['error' => 'Invalid request method']);
}
?>
