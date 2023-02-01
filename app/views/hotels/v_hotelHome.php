<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        <br><br><br>
        <p class="home-title-2" >Find Accomodation Anywhere in Sri Lanka!</p>
        

        <form action="" method="post">
            <div class="nav-main">
                <div class="nav-parts">
                    <p class="hotel-labels-1">Where are you going?</p>
                    <input class="hotel-labels-1" type="text" id="place" placeholder="Your Destination">
                </div>

                <div class="nav-parts">
                    <p class="hotel-labels-1">Check-In Date</p>
                    <input class="hotel-labels-1" type="date" id="date-1" placeholder="Check-In Date">
                    <!-- <p class="hotel-labels-1">Check-In Date</p>  -->
                </div>

                <div class="nav-parts">
                    <p class="hotel-labels-1">Check-Out Date</p> 
                    <input class="hotel-labels-1" type="date" id="date-2" placeholder="Check-Out Date">
                    <!-- <p class="hotel-labels-1">Check-Out Date</p>  -->
                </div>
            </div>

            <div class="home-div-3">
                <button class="all-purpose-btn">Go</button>
            </div>
            
        </form>

        <div class="hotel-home-join-network">
            <p class="home-title-2" style="margin-bottom: 10px;">Join Our Network Today.</p>
            <div class="home-div-3">
                <button class="all-purpose-btn" onclick="location.href='<?php echo URLROOT?>/Hotels/register'">Register Hotel</button>
            </div>
        </div>

        <p class="home-title-2" >Top Picks From Around The Island</p>

        <div class="hotel-home-top-picks">
            <div class="nav-main">
                <div class="hotel-ad-card">
                    <div class="hotel-ad-card-pic">
                        <img src="<?php echo URLROOT; ?>/img/new.jpg" alt="nine-arch">
                        <span class="dot">3.0</span>
                    </div>                    

                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>Hotel Sea Breeze</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">No 108, Rajagiriya</label>
                       <label id="display-hotel-price" for="hotel-price">1,234USD</label>
                    </div>
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-ad-card-pic">
                        <img src="<?php echo URLROOT; ?>/img/new.jpg" alt="nine-arch">
                        <span class="dot">4.1</span>
                    </div>

                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>Hotel Sea Breeze</b></label><br>
                       <label id="display-hotel-address" for="hotel-address">Galle Rd, Panadura</label>
                       <label id="display-hotel-price" for="hotel-price">1,234USD</label> 
                    </div>
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-ad-card-pic">
                        <img src="<?php echo URLROOT; ?>/img/new.jpg" alt="nine-arch">
                        <span class="dot">4.5</span>
                    </div>

                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>Hotel Sea Breeze</b></label><br>
                       <label id="display-hotel-address" for="hotel-address">Galle Rd, Dehiwala</label><br>
                       <label id="display-hotel-price" for="hotel-price">1,234USD</label> 
                    </div>
                </div>
            </div>
        </div>        
        
    </div>

</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>
