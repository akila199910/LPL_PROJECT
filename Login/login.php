<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Check if the user exists in "register" table
    $sql_register = "SELECT * FROM register WHERE email = ?";

    //preventing SQL injection attack
    $stmt_register = mysqli_prepare($conn, $sql_register);
    mysqli_stmt_bind_param($stmt_register, "s", $email);
    mysqli_stmt_execute($stmt_register);
    $result_register = mysqli_stmt_get_result($stmt_register);

    $sql_verification = "SELECT * FROM register WHERE verification = 'verification'";
    $result_verification = mysqli_query($conn, $sql_verification);

    $sql_catogary = "SELECT * FROM register WHERE catogary = 'catogary'";
    $result_catogary = mysqli_query($conn, $sql_catogary);


    // Check if the user exists in "admin" table
    $sql_admin = "SELECT * FROM admin WHERE email = '$email'";
    $result_admin = mysqli_query($conn, $sql_admin);

    // Check if the user exists in "moderators" table
    $sql_moderators = "SELECT * FROM moderators WHERE email = '$email'";
    $result_moderators = mysqli_query($conn, $sql_moderators);

    // Check if the user exists in the "team" table
    $sql_team = "SELECT * FROM team WHERE email = '$email'";
    $result_team = mysqli_query($conn, $sql_team);

    // Check if the user exists in the "guest" table
    $sql_guest = "SELECT * FROM guest WHERE email = '$email'";
    $result_guest = mysqli_query($conn, $sql_guest);

    if ($result_register && mysqli_num_rows($result_register) > 0) {
        $user = mysqli_fetch_assoc($result_register);
        $hashed_password = $user['password'];
        $verification = $user['verification'];
        $player_catogary= $user["catogary"];

        // Verify the provided password against the hashed password
        if (password_verify($password, $hashed_password)) {

            if ($verification == 1) {
                
                // Password is correct, user is authenticated
                session_start();
                $_SESSION['user_id'] = $user['player_id'];
                $_SESSION['user_email'] = $user['email'];
                
                if($player_catogary == 'BATSMAN') {
                    header("Location: ../Players/Batsman/batsmandashboard.php"); // Redirect to the player dashboard page
                exit();
                }
                
                elseif($player_catogary == 'ALLROUNDER') {
                    header("Location: ../Players/Allrounder/Allrounderdashboard.php"); // Redirect to the player dashboard page
                exit();
                }

                elseif($player_catogary == 'WICKETKEEPER') {
                    header("Location: ../Players/Wicketkeeper/wicketkeeperdashboard.php"); // Redirect to the player dashboard page
                exit();
                }

                elseif($player_catogary == 'BOWLER') {
                    header("Location: ../Players/Bowler/bowllerdashboard.php"); // Redirect to the player dashboard page
                exit();
                }


            } else{
                echo "<script>alert('Your Email not Verified. Please Check Your Email.');</script>";
                
            }


        } else {
            echo "Invalid password";
        }
    } elseif ($result_admin && mysqli_num_rows($result_admin) > 0) {
        $admin = mysqli_fetch_assoc($result_admin);
        $hashed_password = $admin['password'];

        // Verify the provided password against the hashed password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, admin is authenticated
            session_start();
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['admin_email'] = $admin['email'];
            // ... other admin data

            header("Location: /LPL_PROJECT/LPL_PROJECT/Admin/index.php"); // Redirect to the admin dashboard page
            exit();
        } else {
            echo "Invalid password";
        }
    } elseif ($result_moderators && mysqli_num_rows($result_moderators) > 0) {
        $moderators = mysqli_fetch_assoc($result_moderators);
        $hashed_password = $moderators['password'];

        // Verify the provided password against the hashed password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, admin is authenticated
            session_start();
            $_SESSION['moderators_id'] = $moderators['id'];
            $_SESSION['moderators_email'] = $moderators['email'];
            // ... other moderators data

            header("Location: /LPL_PROJECT/LPL_PROJECT/Moderator/Moderator_dashboard/moderator_dashboard.php"); // Redirect to the moderators dashboard page
            exit();
        } else {
            echo "Invalid password";
        }
    } elseif ($result_team && mysqli_num_rows($result_team) > 0) {
        $team = mysqli_fetch_assoc($result_team);
        $hashed_password = $team['password'];

        // Verify the provided password against the hashed password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, admin is authenticated
            session_start();
            $_SESSION['team_id'] = $team['id'];
            $_SESSION['team_email'] = $team['email'];
            // ... other team data

            header("Location: /LPL_PROJECT/LPL_PROJECT/Team/Team_dashboard/team_dashboard.php"); // Redirect to the team dashboard page
            exit();
        } else {
            echo "Invalid password";
        }
    } elseif ($result_guest && mysqli_num_rows($result_guest) > 0) {
        $guest = mysqli_fetch_assoc($result_guest);
        $hashed_password = $guest['password'];

        // Verify the provided password against the hashed password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, guest is authenticated
            session_start();
            $_SESSION['guest_id'] = $guest['guest_id'];
            $_SESSION['guest_email'] = $guest['email'];
            // ... other guest data

            header("Location: /LPL_PROJECT/LPL_PROJECT/Guest/Guest_dashboard/guest_dashboard.php"); // Redirect to the guest dashboard page
            exit();
        }  else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid email";
    }
}

mysqli_close($conn);
?>