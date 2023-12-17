<div class="header">
<?php 
    $pageTitle = "LPL 2023"; 
    include('header.php'); 
    include "conn.php";
        mysqli_select_db($conn,"lplsystem");
        $sql= "SELECT * FROM rule ";
        $result=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_array($result)) {
            $auction_year = $row["auction_year"];
            $register_period = $row["register_period"];
            $start	= $row["start"];
        }
        ?>
        <br>
        <style>
            .scroll-container {
    width: 100%;
    overflow: hidden;
    color: #FF0000;
}

@keyframes scroll {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}

.scrolling-text {
    white-space: nowrap; 
    animation: scroll 10s linear infinite; 
}

            </style>
          
        <div class="scroll-container">
        <div class="scrolling-text">
            <div class="row">
               <h3> The auction is start <?php echo $start;?> please register</h3>
    </div>
    </div>
    </div>

    <div class="row">
        <div class="col-2">
            <h1>Make Your <br>Best Team!</h1>
            <h1><span class="auto-input">Galle Titans</span></h1>
            <p>The LPL is a professional esports league for the popular online multiplayer game "League of Legends." It is based in China and features top-tier teams competing in the game. The league is known for its high level of play, and it is one of the most prestigious competitions in the esports world.</p>
                  <a href="https://www.lankapremierleaguet20.com/" class="btn">Explore Now &#8594;</a>

                 
        </div>
        <div class="col-2">
            <img src="images/chandimal.png" width="5000px">
        </div>
    </div>
</div>
</div>


<div class="small-container">
    
    <h2 class="title">Our Teams</h2>

    


    <div id="portfolio">
        <div class="container">
           
            
           
    
            <div class="work-list">
                <div class="work" >
                    <img src="images/galle.png">
                    <div class="layer">
                        <h3>Galle Titans</h3>
                        
                        <a href="https://www.youtube.com/@GalletitansLPL"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <div class="work">
                    <img src="images/colombo.png">
                    <div class="layer">
                        <h3>Colombo Strikers</h3>
                        
                        <a href="https://www.youtube.com/@Colombostrikersofficial"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <div class="work">
                    <img src="images/kandy.png">
                    <div class="layer">
                        <h3>B-Love Kandy</h3>
                        
                        <a href="https://www.youtube.com/@BLoveKandy"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <div class="work">
                    <img src="images/jaffna.png">
                    <div class="layer">
                        <h3>Jaffna Kings</h3>
                        
                        <a href="https://www.youtube.com/@JaffnaKingsSL"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>

                <div class="work">
                    <img src="images/dabulla.png">
                    <div class="layer">
                        <h3>Dambulla Aura</h3>
                       
                        <a href="https://www.youtube.com/@dambullaauralpl"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
        
   
</div>



<!--------------------offer----------->

<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="images/winner.png" class="offer-img">
            </div>
            
            <div class="col-2">
                <p>Winner in 2023</p>
                <h1>B-Love Kandy</h1>
                <small>Player of the match is Angelo Mathews<br>Player of the Tournament is Wanindu Hasaranga</small><br>
                <br>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/vdPFAHOU1R4?si=JD3EEu8yRjJ1mHgB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen> class="btn">Watch Final &#8594;</iframe>
                
            </div>
        </div>
    </div>
</div>


<!---------------testimonial---------->






<!------------------brands--------->

<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="images/logo-godrej.png">
            </div>
            <div class="col-5">
                <img src="images/logo-oppo.png">
            </div>
            <div class="col-5">
                <img src="images/logo-coca-cola.png">
            </div>
            <div class="col-5">
                <img src="images/logo-paypal.png">
            </div>
            <div class="col-5">
                <img src="images/logo-philips.png">
            </div>
        </div>
    </div>
</div>




<?php 

    
    $pageTitle = "LPL 2023"; 
    include('footer.php'); 
    
    ?>

