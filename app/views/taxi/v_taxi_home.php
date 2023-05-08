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
                        <option value="Tuk Tuk">Tuk Tuk</option>
                        <option value="Car">Car</option>
                        <option value="Van">Van</option>
                        <option value="Bus">Bus</option>
                    </select>
                </div>



                <!-- <div class="nav-parts">
                    <p class="hotel-labels-1">Trip Date</p> 
                    <input class="hotel-labels-1" type="date" id="date-2" placeholder="Check-Out Date">
                    
                </div> -->



                <div class="nav-parts">
                    <p class="hotel-labels-1">Pick up location</p>
                    <select class="district-labels-1" id="taxi_add_v_area" name="area">
                        <!-- <option value="<?php echo $data['area']?>" selected  hidden><?php echo $data['area']?></option> -->
                                            
                            <option value="Ampara">Ampara</option>
                            <option value="Anuradhapura">Anuradhapura</option>
                            <option value="Badulla">Badulla</option>
                            <option value="Batticaloa">Batticaloa</option>
                            <option value="Colombo">Colombo</option>
                            <option value="Galle">Galle</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Hambantota">Hambantota</option>
                            <option value="Jaffna">Jaffna</option>
                            <option value="Kalutara">Kalutara</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Kegalle">Kegalle</option>
                            <option value="Kilinochchi">Kilinochchi</option>
                            <option value="Kurunegala">Kurunegala</option>
                            <option value="Mannar">Mannar</option>
                            <option value="Matale">Matale</option>
                            <option value="Matara">Matara</option>
                            <option value="Monaragala">Monaragala</option>
                            <option value="Mullaitivu">Mullaitivu</option>
                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                            <option value="Polonnaruwa">Polonnaruwa</option>
                            <option value="Puttalam">Puttalam</option>
                            <option value="Ratnapura">Ratnapura</option>
                            <option value="Trincomalee">Trincomalee</option>
                            <option value="Vavuniya">Vavuniya</option>

                        </select>

                                                       
                                            
                </div>



                <!-- <div class="nav-parts">
                    <p class="hotel-labels-1">Drop off location</p>
                    <input type="text" class="hotel-labels-1" id="destination" name="destination" placeholder="Destination">
                </div> -->

                
                
                
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
               <?php
                    foreach($data['owners'] as $owners):
               ?> 
            
                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Taxi_Vehicle/taxideatails/<?php echo $owners->OwnerID?>'">
                    <div class="hotel-ad-card-pic">
                        <img id="tax_home_img" src="<?php echo URLROOT; ?>/img/taxi-com.jpg" alt="nine-arch">
                        <span class="dot">4.5</span>
                    </div>                    


                    <div class="hotel-ad-card-desc">      
                       
                       <?php 
                            if(!$owners->company_name){
                        ?>
                        <label id="" for="hotel-name"><b>Owner Name:<?php echo $owners->owner_name?></b></label> <br>
                        <?php
                            }else{
                        ?>
                        <label id="taxi-hide-homeCont" for="hotel-name"><b><?php echo $owners->company_name?></b></label> <br>
                        <?php 
                            }
                        ?>

                       <label id="display-hotel-address" for="hotel-address"><?php echo $owners->address?></label><br>
                       <!-- <label id="display-hotel-price" for="hotel-price"><b>5 USD/KM</b> </label> -->
                    </div>
                </div>

                <?php
                    endforeach;
                ?>

                
            </div>
        </div>        
        
    </div>

</div>





