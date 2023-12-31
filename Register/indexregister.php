<html>

<head>
    <link href="bootstrap.min.css" rel="stylesheet">

    <link href="reg.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/17d9527542.js" crossorigin="anonymous"></script>
    <style>
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


        nav {
            flex: 1;
            text-align: right;
        }

        nav ul {
            display: inline-block;
            list-style-type: none;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav ul li i {
            margin-right: 15px;

        }

        a {
            text-decoration: none;
            color: #555;
        }

        h1 {
            color: #000;

            padding: 10px;
            text-align: center;
            text-decoration: underline;
            font-family: 'Arial'
        }

        .card {
            width: 95%;
            max-width: 3000px;
            color: #000;
            text-align: center;
            padding: 50px 35px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            margin-left: auto;
            margin-right: auto;

        }
    </style>
</head>


<body>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="bootstrap.js"></script>


    <script>
        function checkPasswordMatch() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password !== confirmPassword) {
                document.getElementById("passwordMatchError").innerHTML = "Passwords do not match";
                submitButton.disabled = true;
            } else {
                document.getElementById("passwordMatchError").innerHTML = "";
                submitButton.disabled = false;

            }
        }
    </script>



    <!--insert php code here-->

    <div class="navbar">
        <div class="logo">
            <a href="home.php"><img src="../images/lpllogo.png" width="125px"></a>
        </div>
        <nav>
            <ul>
                <li><i class="fa-solid fa-house"></i><a href="../home.php">Home</a></li>
                <li><i class="fa-brands fa-unity"></i><a href="../about.php">About</a></li>
                <li><i class="fa-solid fa-briefcase"></i><a href="../contact_us.php">Contact</a></li>
                <li><i class="fa-solid fa-comment"></i><a href="../loginform.php">Account</a></li>
            </ul>
        </nav>

    </div>

    <div class="container mt-4">
        <br><br><br><br><br>
        <div class="card" data-tilt>
            <h1>Player Registration Form</h1>
            <div class="row justify-content-center">
                <form action="" class="form-box" method="POST" enctype="multipart/form-data">

                    <div class="row ">
                        <div class="form-group col-md-6 mb-2">
                            <input type="text" id="fname" name="first_name" placeholder="First name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <input type="text" id="lname" name="last_name" placeholder="Last name" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mb-2">
                            <input type="email" id="email" name="email" placeholder="E-mail" class="form-control " required>
                        </div>

                        <div class="form-group col-md-6 mb-2">
                            <input type="text" id="co" name="country" placeholder="Country" class="form-control" required>
                        </div>


                        <div class="form-group col-md-6  mb-2">
                            <input type="password" id="password" name="password" placeholder="Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>

                        <div class="form-group col-md-6  mb-2">

                            <input type="password" id="confirmPassword" name="confirmpwd" placeholder="confirm Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onkeyup="checkPasswordMatch()">
                            <span id="passwordMatchError" style="color: red;"></span>

                        </div>







                        <div class="row form-group mt-2">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-7">



                                <select name="capped" class="form-select" required>
                                    <option value="" disabled selected hidden>You an International Player?</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>



                        </div>


                        <div class="form-group col-6 mt-3">
                            <select name="catogary" class="form-select" required>
                                <option value="" disabled selected hidden>Catogary</option>
                                <option value="BATSMAN">Batsman</option>
                                <option value="BOWLER">Bowler</option>
                                <option value="WICKETKEEPER">Wicket-Keeper</option>
                                <option value="ALLROUNDER">All-Rounder</option>
                            </select>
                        </div>

                        <div class="row mt-3">

                            <div class="form-group  col-5">
                                <label>Birthday </label>
                            </div>
                            <div class="form-group col-7">
                                <input type="date" class="form-control" name="dob" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group  col-5">
                                <label> Profile Photo</label>
                            </div>
                            <div class="form-group col-7">
                                <input type="file" class="form-control" name="profile_photo" accept=".jpg, .jpeg, .png" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <select name="identity" class="form-select" required>
                                    <option value="" disabled selected hidden>Verification Method</option>
                                    <option value="nic">NIC</option>
                                    <option value="driving_license">Driving License</option>
                                    <option value="Passport">Passport</option>
                                </select>
                            </div>


                            <div class="form-group col-6">

                                <input type="text" class="form-control" name="identity_number" placeholder="Id Number" required>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="form-group col-7">
                                <label for="nicphoto"> Identity Photo</label>
                            </div>
                            <div class="form-group col-5">
                                <input type="file" class="form-control" name="identity_photo" accept=".jpg, .jpeg, .png" required>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="form-group col-7">
                                <label for="nicphoto"> Certificate Photo</label>
                            </div>
                            <div class="form-group col-5">
                                <input type="file" class="form-control" name="certificatephoto" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>



                        <div class="row mt-3">
                            <textarea class="form-control" name="additional_details" rows="3" placeholder="Additional details ">
                            </textarea>
                        </div>
                        
                        <label>
                            <input type="radio" name="agreeTerms" value="agree" required>
                            I agree to the Terms & Conditions.
                        </label>

                        <div class="row row-margin justify-content-center mt-4">

                            <button type="submit" name="submit" id="submitButton" class="btn btn-primary btn-sm" disabled>SUBMIT</button>

                        </div>




                </form>
            </div>

        </div>



</body>


</html>

<?php
include("conn.php");
mysqli_select_db($conn, "lplsystem");

// Create playersregistation table if it doesn't exist

$sql = "CREATE TABLE IF NOT EXISTS register (
        player_id INT PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        country VARCHAR(255) NOT NULL,
        dob DATE NOT NULL,
        profile_photo VARCHAR (255),
        identity VARCHAR (255),
        identity_number VARCHAR (255),
        identity_photo VARCHAR (255),
        catogary VARCHAR (255),
        capped VARCHAR (255),
        additional_details TEXT,
        certificate_photo VARCHAR(255),
        verification VARCHAR(255),
        verification_code VARCHAR(255),
        approved VARCHAR (255) NULL,
        moderators_id INT

    )";

mysqli_query($conn, $sql);


if (isset($_POST['submit'])) {


    $email = $_POST['email'];
    $check_email_query = "SELECT * FROM register WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($result) > 0) {
        // Email already exists, show an error message or redirect to a registration page
        echo "<script>alert('Email already exists. Please use a different email.');</script>";
    } else {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $country = $_POST['country'];
        $dob = $_POST['dob'];
        $identity = $_POST['identity'];
        $identity_number = $_POST['identity_number'];
        $catogary = $_POST['catogary'];
        $capped = $_POST['capped'];
        $additional_details = $_POST['additional_details'];
        // Encrypt the password using password_hash() function
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        $file_name1 = $_FILES['identity_photo']['name'];
        $file_type1 = $_FILES['identity_photo']['type'];
        $file_size1 = $_FILES['identity_photo']['size'];
        $temp_name1 = $_FILES['identity_photo']['tmp_name'];
        // Generate a unique filename
        $imageFileType1 = strtolower(pathinfo($file_name1, PATHINFO_EXTENSION));
        $newFileName1 = uniqid() . '_' . time() . '.' . $imageFileType1;

        $upload_to1 = "Img/idimg/";
        move_uploaded_file($temp_name1, $upload_to1 . $newFileName1);




        $file_name2 = $_FILES['certificatephoto']['name'];
        $file_type2 = $_FILES['certificatephoto']['type'];
        $file_size2 = $_FILES['certificatephoto']['size'];
        $temp_name2 = $_FILES['certificatephoto']['tmp_name'];
        // Generate a unique filename
        $imageFileType2 = strtolower(pathinfo($file_name2, PATHINFO_EXTENSION));
        $newFileName2 = uniqid() . '_' . time() . '.' . $imageFileType2;

        $upload_to2 = "Img/cetiimg/";
        move_uploaded_file($temp_name2, $upload_to2 .  $newFileName2);



        $file_name3 = $_FILES['profile_photo']['name'];
        $file_type3 = $_FILES['profile_photo']['type'];
        $file_size3 = $_FILES['profile_photo']['size'];
        $temp_name3 = $_FILES['profile_photo']['tmp_name'];
        // Generate a unique filename
        $imageFileType3 = strtolower(pathinfo($file_name3, PATHINFO_EXTENSION));
        $newFileName3 = uniqid() . '_' . time() . '.' . $imageFileType3;

        $upload_to3 = "Img/proimg/";
        move_uploaded_file($temp_name3, $upload_to3 .  $newFileName3);


        // Generate a verification code (you can use a stronger method if needed)
        $verif_code = bin2hex(random_bytes(16));

        // Insert the user data into the database with the verification code
        $sql3 = "INSERT INTO register (first_name, last_name, email, password, country, dob, identity, identity_number, catogary, capped, additional_details, profile_photo, identity_photo, certificate_photo,verification, verification_code)
  VALUES ('$first_name','$last_name','$email','$hashed_password','$country','$dob','$identity','$identity_number','$catogary','$capped','$additional_details','$newFileName3','$newFileName1','$newFileName2', 0, '$verif_code')";

        $query = mysqli_query($conn, $sql3);

        if ($query) {
?>
            <script>
                swal({
                    title: "SUCCESS..!!",
                    text: "Verify Your Email Now..!!",
                    icon: "success",
                    buttons: {
                        goodJob: {
                            text: "GOOD JOB",
                            value: "goodJob",
                        },
                    },
                }).then((value) => {
                    if (value === "goodJob") {
                        // Add your web address here
                        window.location.href = "../loginform.php";
                    }
                });
            </script>
<?php
        }

        if ($query) {

            // Send a verification email
            $subject = "Verify Your Email Address";
            $message = "Click the following link to verify your email address: http://localhost/LPL_PROJECT/LPL_PROJECT/Register/verify.php?code=$verif_code";
            $headers = "From: premierleaguesrilanka@gmail.com";

            mail($email, $subject, $message, $headers);
        }

        // echo "<script>alert('Check your mail box');</script>";
        //  echo '<script> window.location.href = "http://localhost/LPL_PROJECT/LPL_PROJECT/loginform.php"</script>';
    }
}
mysqli_close($conn);
?>