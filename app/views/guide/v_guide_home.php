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
            
        </form><br>


        <br><br><p class="home-title-2" >Top Rated guides </p>

        <div class="hotel-home-top-picks">
            <div class="nav-main">
                <?php
                
                foreach($data['allguides'] as $guide):
                    
                ?>
                <a href="<?php echo URLROOT?>/Bookings/GuideBooking/<?php echo $guide->GuideID?>" style="text-decoration:none;">
                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Guides/showGuides'">
                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img-guides" src="<?php echo URLROOT; ?>/img/guide1.jpeg" alt="nine-arch">
                        <span class="dot">3.0</span>
                    </div>                    


                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b><?php echo $guide->Name;?></b></label> <br>
                       <label id="display-hotel-address" for="hotel-address"><?php echo $guide->Area;?></label>
                    </div>

                    <div class="hotel-ad-card-price">
                        <label id="display-hotel-price" for="hotel-price"><b>Rs:<?php echo $guide->Rate;?> per day</b></label>
                    </div>
                </div>
                </a>
                <?php
                endforeach;
                ?>


            </div>
        </div> 
        <div class="taxi-home-join-network"><br>
            <p style="margin-bottom: 10px; font-size: 1.4rem;">Didn't find a guide as you wish? Don't worry you can make a Request.</p>
            <div class="home-div-3">
                <button class="all-purpose-btn" onclick="location.href='<?php echo URLROOT?>/Request/addGuideRequest'" style="background-color: #e8b122;
    color: black;">Request a guide</button>
            </div><br>
        </div>       
        
    </div>

</div>



<?php require APPROOT.'/views/inc/components/footer.php'; ?>
