<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h2>Student Names:</h2>
    <ul>
        <?php
        include("conn.php");
        mysqli_select_db($conn,"lplsystem");

        // Retrieve student names and IDs from the "Stud" table
        $sql = "SELECT id, studentname FROM Stud";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<li><a href="details.php?studentid=' . $row['id'] . '">' . $row['studentname'] . '</a></li>';
            }
        } else {
            echo "No student names found.";
        }

        $conn->close();
        ?>
    </ul>
</body>
</html>
