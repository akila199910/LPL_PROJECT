<?php if (isset($login_error)) { ?>
        <p style="color: red;"><?php echo $login_error; ?></p>
    <?php } ?> 
    
    <!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
    <title>Login Form(responsible)</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="snow">
    <section>
    <div class="login-box">
    <form method="POST" action="login.php">
        <h2>Login</h2>
        <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
        <input type="email" name="email" required>
        <label>Email</label>
    </div>

    <div class="input-box">
        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
        <input type="password" name="password" required>
        <label>Password</label>
    </div>

    <div class="remember-forgot">
        <label><input type="checkbox">Remember me</label>
        <a href="#">Forgot Password?</a>
    </div>

        <button type="submit" name="login">Login</button>
    <div class="register-link">
        <p>Don't have an account? <a href="#">Register</a></p>
    </div>
    </form>
    </div>
</section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </div>
</body>
</html>
