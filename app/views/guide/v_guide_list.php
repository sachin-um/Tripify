<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        
        <p class="home-title-2" >Results for your Search</p>
        

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

        <div class="hotel-home-top-picks">
            <div class="nav-main">
                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Guides/showGuideDetails'">
                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/guidehome.png" alt="nine-arch">
                        <span class="dot">3.0</span>
                    </div>                    

                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>Sunil Shantha</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">Colombo,Western province</label>
                    </div>

                    <div class="hotel-ad-card-price">
                        <label id="display-hotel-price" for="hotel-price"><b>View Profile</b></label>
                    </div>
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/guidehome.png" alt="nine-arch">
                        <span class="dot">4.1</span>
                    </div>

                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>Shehan liyanage</b></label><br>
                       <label id="display-hotel-address" for="hotel-address">kandy,Central Province</label> 
                    </div>

                    <div class="hotel-ad-card-price">
                        <label id="display-hotel-price" for="hotel-price"><b>View Profile</b></label>
                    </div>
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/guidehome.png" alt="nine-arch">
                        <span class="dot">4.5</span>
                    </div>

                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>Hasindu guruge</b></label><br>
                       <label id="display-hotel-address" for="hotel-address">jaffna,North province</label> 
                    </div>

                    <div class="hotel-ad-card-price">
                        <label id="display-hotel-price" for="hotel-price"><b>View Profile</b></label>
                    </div>
                </div>
            </div>


            <div class="nav-main">
                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Hotels/showHotels'">
                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/guidehome.png" alt="nine-arch">
                        <span class="dot">3.0</span>
                    </div>                    

                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>lasindu wathsan</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">galle,<br>south province</label>
                    </div>

                    <div class="hotel-ad-card-price">
                        <label id="display-hotel-price" for="hotel-price"><b>View Profile</b></label>
                    </div>
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/guidehome.png" alt="nine-arch">
                        <span class="dot">4.1</span>
                    </div>

                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>sasindu mendis</b></label><br>
                       <label id="display-hotel-address" for="hotel-address">Anuradhapura,<br>North Central</label> 
                    </div>

                    <div class="hotel-ad-card-price">
                        <label id="display-hotel-price" for="hotel-price"><b>View Profile</b></label>
                    </div>
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/guidehome.png" alt="nine-arch">
                        <span class="dot">4.5</span>
                    </div>

                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>pasindu peris</b></label><br>
                       <label id="display-hotel-address" for="hotel-address">nuwara Eliya,central province</label> 
                    </div>

                    <div class="hotel-ad-card-price">
                        <label id="display-hotel-price" for="hotel-price"><b>View Profile</b></label>
                    </div>
                </div>
            </div>
        </div>        
        
    </div>

</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>
