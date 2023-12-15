<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <title><?php echo $pageTitle; ?></title>
    
    <link rel="stylesheet" href="css/style.css">
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

        </style>
</head>
<body>
    
    

    <div class="container">

    
    <div class="navbar">
        <div class="logo">
           <a href="home.php"><img src="images/lpllogo.png" width="125px"></a>
        </div>
        <nav>
            <ul>
                <li><i class="fa-solid fa-house"></i><a href="home.php">Home</a></li>
                <li><i class="fa-brands fa-unity"></i><a href="about.php">About</a></li>
                <li><i class="fa-solid fa-briefcase"></i><a href="contact_us.php">Contact</a></li>
                <li><i class="fa-solid fa-comment"></i><a href="loginform.php">Account</a></li>
            </ul>
        </nav>
       
    </div>
    