<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        <p class="home-title-2" >Find yourself a guide !</p>
        

        <form action="" method="post">
            <div class="nav-main">
                <div class="nav-parts">
                    <p class="hotel-labels-1">Where are you going?</p>
                    <input class="hotel-labels-1" type="text" id="place" placeholder="Your Destination">
                </div>


                <div class="nav-parts">
                    <p class="hotel-labels-1">Start Date</p>
                    <input class="hotel-labels-1" type="date" id="date-1" placeholder="Check-In Date">
                    <!-- <p class="hotel-labels-1">Check-In Date</p>  -->
                </div>

                <div class="nav-parts">
                    <p class="hotel-labels-1">End Date</p> 
                    <input class="hotel-labels-1" type="date" id="date-2" placeholder="Check-Out Date">
                    <!-- <p class="hotel-labels-1">Check-Out Date</p>  -->
                </div>
            </div>

            <div class="home-div-3">
                <a href=""></a> <button class="all-purpose-btn">Search</button>
            </div>
            
        </form>

        <div class="hotel-home-join-network">
            <p class="home-title-2" style="margin-bottom: 10px;">Didn't find a guide as you wish? Don't worry you can make a Request.</p>
            <div class="home-div-3">
                <button class="all-purpose-btn" onclick="location.href='<?php echo URLROOT?>/Hotels/register'">Request a guide</button>
            </div>
        </div>


        <p class="home-title-2" >Top Rated guides </p>

        <div class="hotel-home-top-picks">
            <div class="nav-main">
                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Guides/showGuides'">
                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/guidehome.png" alt="nine-arch">
                        <span class="dot">3.0</span>
                    </div>                    


                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>Sunil Shantha</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">colombo,western province</label>
                    </div>

                    <div class="hotel-ad-card-price">
                        <label id="display-hotel-price" for="hotel-price"><b>50USD per day</b></label>
                    </div>
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/guidehome.png" alt="nine-arch">
                        <span class="dot">4.1</span>
                    </div>

                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>Shehan liyanage</b></label><br>
                       <label id="display-hotel-address" for="hotel-address">Kandy,Central Province</label> 
                    </div>

                    <div class="hotel-ad-card-price">
                        <label id="display-hotel-price" for="hotel-price"><b>60USD per day</b></label>
                    </div>
                </div>

                <div class="hotel-ad-card">
                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/guidehome.png" alt="nine-arch">
                        <span class="dot">4.5</span>
                    </div>

                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>hasindu guruge</b></label><br>
                       <label id="display-hotel-address" for="hotel-address">jaffna,North province</label> 
                    </div>

                    <div class="hotel-ad-card-price">
                        <label id="display-hotel-price" for="hotel-price"><b>80USD per day</b></label>
                    </div>
                </div>
            </div>
        </div>        
        
    </div>

</div>



<?php require APPROOT.'/views/inc/components/footer.php'; ?>
