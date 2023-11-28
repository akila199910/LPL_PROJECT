

<div class="header">
<?php 
    $pageTitle = "Log In"; 
    include('header.php'); ?>
  
    



<!-------------account page------------>


    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="/LPL_PROJECT/LPL_PROJECT/images/acc.png" width="100%">
            </div>
            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="Indicator">
                    </div>

                    <form id="LoginForm" method="POST" action="http://localhost/LPL_PROJECT/LPL_PROJECT/Login/login.php">
                        <input type="email" placeholder="email" name="email">
                        <input type="password" placeholder="password" name="password">
                        <button type="submit" name="login" class="btn">Login</button>
                        <a href="">Forgot password</a>
                    </form>

                    <form id="RegForm">
                        <P>If you don't have a account press Next</P>
                        <br>
                        <a href="/LPL_PROJECT/LPL_PROJECT/Register/indexregister.php" class="btn">Next &#8594;</a>
                        
                        
                    </form>

                </div>
            </div>
        </div>
    </div>



<!-------------------footer------->
<?php include('footer.php'); ?>


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