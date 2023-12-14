<?php
include "conn.php";
mysqli_select_db($conn, "lplsystem");

// Auto logout without session
session_start();

if (isset($_SESSION['admin_id'])) {

} else {
    header("Location: ../logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        function getPrint() {
            // Hide the sidebar before printing
            var sidebar = document.getElementById("sidebar");
            sidebar.style.display = "none";

            window.print();

            // Restore the sidebar after printing
            sidebar.style.display = "block";
        }
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Team Players</title>
    <style>


.header{
    background: radial-gradient(#fff,#5960de);
    height: 250vh;
}

.bt{
    display: inline-block;
    background: #0096FF;
    
    padding: 8px 30px;
    margin: -40px 0;
    border-radius: 30px;
    border:none;
    transition: background 0.5s;
}

.bt:hover{
    background: #5960de;
}

.navbar {
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: #4169E1;
    z-index: 1000;
    width: 100vw; 
    position: fixed; 
    top: 0; 
    left: 0; 
}


nav{
    flex: 1;
    text-align: right;
}

nav ul{
    display: inline-block;
    list-style-type: none;
}

nav ul li{
    display: inline-block;
    margin-right: 20px;
}

nav ul li i{
    margin-right: 15px;

}

a{
    text-decoration: none;
    color: #555;
}
p{
    color: #fff;
    text-align:center;
}


        </style>
</head>
<div class="header">

<body>
    <div id="sidebar"> 
<?php
include('sidebar.php');
?></div>
<div class="navbar row">
        <div class="logo col-4" >
           <img src="../../images/lpllogo.png" width="125px"> 
        </div>

        <div class="col-8" style="color: #fff; font-size:20px;">   LPL - LANKA PREMIER LEAGUE</div>
        </nav>
       
    </div>
    <br><br><br><br>
<div class="content">
    <div class="container">
        <?php
        include("conn.php");
        mysqli_select_db($conn, "lplsystem");

        $sql = "SELECT * FROM team";
        $result = mysqli_query($conn, $sql);
        ?>
        <form id="form">
            <select id="teamSelect" name="teamSelect" class='form-select' required>
                <option value='' disabled selected hidden>Select the team</option>
                <?php
                // Create while loop
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['team_name'] . "</option>";
                }
                ?>
            </select>
            <br>
            <button type="button" name="submit" id="submit" class="bt">SEARCH</button> <button onclick="getPrint()" class="bt">Download</button>
        </form>
        <div id="team" class="team"></div>
        <script>
            $(document).ready(function () {
                $("#submit").click(function () {
                    var teamId = $("#teamSelect").val();
                    $.ajax({
                        type: "POST",
                        url: "teammembers.php",
                        data: {teamSelect: teamId},
                        success: function (data) {
                            $(".team").html(data);
                        }
                    });
                });
            });
        </script>
    </div>
    <br>
    
</div>

</body>
</html>
