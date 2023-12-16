

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
   <link rel="stylesheet" type="text/css" href="style.css" />
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

a{
    text-decoration: none;
    color: #555;
}

p{
    color: #fff;
    text-align:center;
}

.header{
    background: radial-gradient(#fff,#5960de);
    height: 500vh;
}


.container{

    align-items: center;
}


@import url('https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700&display=swap');
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: sans-serif;
}

.contact{
    min-height: 100vh;
    background-color: radial-gradient(#fff,#5960de);
    text-align: center;
}

.container2{
    max-width: 800px;
    margin: 0 auto;
}

.container2 h2{
    font-size: 36px;
    margin-bottom: 40px;
    color: #333;
}

.contact-wrapper{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 30px;
}

.contact-form{
    text-align: left;
}

.contact-form h3{
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.form-group{
    margin-bottom: 20px;
}

input,textarea{
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: none;
    background-color: #f8f9fa;
    color: #333;
}

input:focus,
textarea:focus{
    outline: none;
    box-shadow: 0 0 8px #bbb;
}

button{
    display: inline-block;
    padding: 10px 24px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: 0.3s ease;
}

button:hover{
    background-color: #45a049;
}

.contact-info{
    text-align:left ;
}

.contact-info h3{
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.contact-info p{
    margin-bottom: 10px;
    color: #555;
}

.contact-info i{
    color: #4caf50;
    margin-right:10px;
}



@media screen and(max-width:768px){
    .container2{
        padding: 20px;
    }
    .contact-wrapper{
        grid-template-columns: 1fr;
    }
} 

.success {
    background-color: #9fd2a1;
    padding: 5px 10px;
    text-align: center;
    color: #326b07;
    border-radius: 3px;
    font-size: 14px; 
    margin-top: 10px;
}

.bt{
    display: inline-block;
    background: #ff523b;
    
    padding: 8px 30px;
    margin-left: auto;
    margin-right: auto;
    border-radius: 30px;
    transition: background 0.5s;
    margin-top: 30px;
    
    
}

.bt:hover{
    background: #5960de;
}



.card {
    width: 50%;
    max-width: 3000px;
    color: #fff;
    text-align: center; /* Center the text */
    padding: 50px 35px;
    border: 1px solid rgba(255,255,255,0.3);
    background: rgba(255,255,255,0.2);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(5px);
    margin-left: auto;
    margin-right: auto;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.col-8 {
    flex: 1;
    text-align: center; /* Center the text */
    color: #fff;
    font-size: 20px;
}
    </style>
</head>

<div class="header">


<body>
<section class="contact">
<div class="container2">
<div class="navbar row">
        <div class="logo col-4" >
           <img src="../../images/lpllogo.png" width="125px"> 
        </div>

        <div class="col-8" style="color: #fff; font-size:20px;">   LPL - LANKA PREMIER LEAGUE</div>
        </nav>
       
    </div>
    
    <br><br><br><br>
    <div class=bg>
    <div class="card" data-tilt>

    <h2>Change Password</h2>
    <form id="passwordForm" action="changepw.php" method="post">
        <table>
        <tr><td><label for="oldPassword">Old Password:</label></td>
        
        <td><input type="password" name="oldPassword" placeholder="old Password" required></td></tr>
        
        <tr><td><label for="newPassword">New Password:</label></td>
        
        <td><input type="password" name="newPassword" placeholder="new Password" required></td></tr>
        
        <tr><td><label for="confirmPassword">Confirm Password:</label></td>
        
        <td><input type="password" name="confirmPassword" placeholder="confirm Password" required></td></tr>
        
        <span id="error" style="color: red;"></span>
        
        
        <tr><td><button type="submit" value="Change Password" class="bt" >Change Password</button></td>
            </tr>
            <tr><td><button type="cancel" value="Cancel" class="bt" >Change Password</button></td>
            </tr>
        </table>
    </form>
    
</div>

    <script>
        document.getElementById("passwordForm").addEventListener("submit", function (e) {
            var newPassword = document.getElementById("newPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (newPassword !== confirmPassword) {
                e.preventDefault();
                document.getElementById("error").innerText = "New password and confirm password do not match.";
            }
        });
    </script>
</body>
</html>
