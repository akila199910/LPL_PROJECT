<div class="header">

<?php 
    $pageTitle = "Contact Us Page"; 
    include('header.php'); ?>
    
    <link rel="stylesheet" type="text/css" href="css/contact_us.css">




<br><br><br><bR>
    <section class="contact">
<div class="container2">
            <h2>Contact Us</h2>
            <div class="contact-wrapper">
                <div class="contact-form">
                    <h3>Send us a message</h3>
                    <form method="post" name="emailContact" action="https://formsubmit.co/premierleaguesrilanka@gmail.com">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name" id="name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" id="email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" placeholder="Subject" id="subject">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" name="Send" id="btn">Send Message</button>
                        
                        
                        
                        
                        
                    </form>
                </div>
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <p><i class="fas fa-phone"></i>+1 123 456 789</p>
                    <p><i class="fas fa-envelope"></i>premierleaguesrilanka@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt"></i>SLCB,Colombo 07,Sri Lanka</p>
                </div>
            </div>
        </div> 
    </section>
</div>
    <?php include('footer.php'); ?>
</body>

</html>