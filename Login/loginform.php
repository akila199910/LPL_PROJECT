<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <title>Log In</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/17d9527542.js" crossorigin="anonymous"></script>
</head>
<body>
   

    <div class="container">
    <div class="navbar">
        <div class="logo">
            <img src="/images/lpllogo.png" width="125px">
        </div>
        <nav>
            <ul>
                <li><i class="fa-solid fa-house"></i><a href="/home.html">Home</a></li>
                <li><i class="fa-brands fa-unity"></i><a href="/about.html">About</a></li>
                <li><i class="fa-solid fa-briefcase"></i><a href="/contact.html">Contact</a></li>
                <li><i class="fa-solid fa-comment"></i><a href="/Login/loginform.php">Account</a></li>
            </ul>
        </nav>
        
    </div>
    
    </div>
</div>
</div>

<!-------------account page------------>

<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="/images/acc.png" width="100%">
            </div>
            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="Indicator">
                    </div>

                    <form id="LoginForm" method="POST" action="login.php">
                        <input type="text" placeholder="email" name="email">
                        <input type="password" placeholder="password" name="password">
                        <button type="submit" name="login" class="btn">Login</button>
                        <a href="">Forgot password</a>
                    </form>

                    <form id="RegForm">
                        <P>If you don't have a account press Next</P>
                        <br>
                        <a href="/Register/indexregister.php" class="btn">Next &#8594;</a>
                        
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>



<!-------------------footer------->


<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Dowload Our App</h3>
                <p>Dowload App for Android and ios mobile phone.</p>
                <div class="app-logo">
                    <img src="images/play-store.png">
                    <img src="images/app-store.png">
                </div>
            </div>
            <div class="footer-col-2">
                <img src="images/white lpl.png">
                <p>Our Purpose is to Sustainably make the pleaseure and benifits of sports accessible to many.</p>
            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>Cupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follow us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Linked In</li>
                    <li>Instagram</li>
                    <li>Youtube</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright -OM</p>
    </div>
</div>

<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

    function register(){
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
    }

    function login(){
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";                                                                                                                                       
    }
</script>
    
</body>
</html>