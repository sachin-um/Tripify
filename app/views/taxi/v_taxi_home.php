<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>


<div class="wrapper"> 
    <div class="tax-home-content">
        <br><br><br>
        <p class="home-title-2" >Where are you going?</p>
        

        <form action="" method="post">
            <div class="nav-main">
                
                <div class="nav-parts">
                    <p class="hotel-labels-1">Vehicle Type</p>
                    <select class="hotel-labels-1" id="vehicle-type" name="vehicle-type">
                        <option value="car">Tuk Tuk</option>
                        <option value="van">Car</option>
                        <option value="fiat">Van</option>
                        <option value="audi">Bus</option>
                    </select>
                </div>

                <div class="nav-parts">
                    <p class="hotel-labels-1">Trip Date</p> 
                    <input class="hotel-labels-1" type="date" id="date-2" placeholder="Check-Out Date">
                    <!-- <p class="hotel-labels-1">Check-Out Date</p>  -->
                </div>

                <div class="nav-parts">
                    <p class="hotel-labels-1">Pick up location</p>
                    <input type="text" class="hotel-labels-1" id="place" name="place" placeholder="Pick up location">
                </div>

                <div class="nav-parts">
                    <p class="hotel-labels-1">Drop off location</p>
                    <input type="text" class="hotel-labels-1" id="destination" name="destination" placeholder="Destination">
                </div>

                
                
                
            </div>

            <div class="home-div-3">
                <button class="all-purpose-btn">Go</button>
            </div>
            
        </form>


        <div class="hotel-home-join-network">
            
            <p class="home-title-2" style="margin-bottom: 10px;">Didn't find what you looking for ? Don't Worry you can still get what you want</p>
            
            <div class="home-div-3">
                <button class="all-purpose-btn" type="button" onclick="window.location='<?php echo URLROOT; ?>/Request/addTaxiRequest'">Request a Ride</button>
            </div>


        </div>


        <div class="hotel-home-join-network">
            <p class="home-title-2" style="margin-bottom: 10px;">Join Our Network Today.</p>
            <div class="home-div-3">
                <button class="all-purpose-btn" onclick="window.location='<?php echo URLROOT; ?>/Taxies/register'">Register Taxi Owner</button>
            </div>
        </div>


        <p class="home-title-2" >Top Taxi Companies Around The Island</p>

        <div class="hotel-home-top-picks">
            <div class="nav-main">
                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Taxi_Vehicle/taxideatails'">
                    <div class="hotel-ad-card-pic">
                        <img id="tax_home_img" src="<?php echo URLROOT; ?>/img/taxi-com.jpg" alt="nine-arch">
                        <span class="dot">4.5</span>
                    </div>                    


                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>Kankaroo Cabs</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">No 108, Rajagiriya</label><br>
                       <label id="display-hotel-price" for="hotel-price"><b>5 USD/KM</b> </label>
                    </div>
                </div>


                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Taxi_Vehicle/taxideatails'">
                    <div class="hotel-ad-card-pic">
                        <img id="tax_home_img" src="<?php echo URLROOT; ?>/img/taxi1.jpeg" alt="nine-arch">
                        <span class="dot">3.8</span>
                    </div>                    


                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>Yoyo Cabs</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">No 10/A, Wellawatta</label><br>
                       <label id="display-hotel-price" for="hotel-price"><b>6 USD/KM</b></label>
                    </div>
                </div>


                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Taxi_Vehicle/taxideatails'">
                    <div class="hotel-ad-card-pic">
                        <img id="tax_home_img" src="<?php echo URLROOT; ?>/img/taxi2.jpg" alt="nine-arch">
                        <span class="dot">4.0</span>
                    </div>                    


                    <div class="hotel-ad-card-desc">
                       <label id="display-hotel-name" for="hotel-name"><b>A9 Cabs</b></label> <br>
                       <label id="display-hotel-address" for="hotel-address">No 12/57, Jaffna</label><br>
                       <label id="display-hotel-price" for="hotel-price"><b>5 USD/KM</b></label>
                    </div>
                </div>

                
            </div>
        </div>        
        
    </div>

</div>





