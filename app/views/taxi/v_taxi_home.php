<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>


<div class="wrapper"> 

    <div class="tax-home-content">
        
        <br><br><br>
        <p class="home-title-2" >Where are you going?</p>
        
            <div class="nav-main">
                
                <div class="nav-parts">
                    <p class="hotel-labels-1">Vehicle Type</p>
                    <select class="hotel-labels-1" id="vehicle-type" name="vehicle-type">
                        <option value="all">All Type</option>
                        <option value="Tuk Tuk">Tuk Tuk</option>
                        <option value="Car">Car</option>
                        <option value="Van">Van</option>
                        <option value="Bus">Bus</option>
                    </select>
                </div>
                <div class="nav-parts">
                <input type="text" placeholder="Search taxis by owner or company name" id="searchInput">


                </div>

                
        


                <div class="nav-parts">
                    <p class="hotel-labels-1">Pick up location</p>
                    <select class="district-labels-1" id="select-district" name="area">
                        <!-- <option value="<?php echo $data['area']?>" selected  hidden><?php echo $data['area']?></option> -->
                            <option value="all">All Districts</option>           
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
                
                
            </div>  
            <div class="home-div-3" id="goback" style="display:none">
                <button class="all-purpose-btn" id="gobackBut">Go Back</button>
            </div>
    </div>
    <div class="tax-home-content" id="hide-div">
            
        <div class="hotel-home-join-network" style="align-items:center">
            
            <p class="home-title-2" style="margin-bottom: 10px;">Didn't find what you looking for ? Don't Worry you can still get what you want</p>
            
            <div class="home-div-3">
                <button class="taxi_request_but" type="button" onclick="window.location='<?php echo URLROOT; ?>/Request/addTaxiRequest'">Request a Ride</button>
                
            </div>


        </div>
    </div>

    <div class="taxi_home_cont">
    <p class="home-title-2" >Top Taxi Companies Around The Island</p>
        <div class="taxi-nav-main" id="vehicle-list">
                    
                    <?php
                        $allvehicles=$data['vehicles'];
                        foreach($allvehicles as $vehicle):
                    ?>
                        <div class="taxi_view_v_dash" id="owners-container">
                            
                            <div class="taxi_veh_det_cont">
                                <div class="hotel-ad-card">

                                <?php
                                    foreach($data['owners'] as $owners):
                                    if($owners->OwnerID ==$vehicle->OwnerID){
                                    
                                ?> 

                                <div class="taxi-ad-card" style="width:100%;" onclick="location.href='<?php echo URLROOT?>/Taxi_Vehicle/taxideatails/<?php echo $owners->OwnerID?>'">
                                    


                                    <div class="">      
                                    
                                        <?php 
                                                if(!$owners->company_name){
                                            ?>
                                            <div class="owner">
                                                <label><b>Owner Name: <?php echo $owners->owner_name?></b></label><br>
                                                <label><?php echo $owners->address?></label><br>
                                            </div>
                                        <?php
                                            } else {
                                        ?>
                                            <div class="owner">
                                                <label><b><?php echo $owners->company_name?></b></label><br>
                                                <label><?php echo $owners->address?></label><br>
                                            </div>
                                            <?php 
                                                }
                                            ?>

                                        <label id="display-hotel-address" for="hotel-address"><?php echo $owners->address?></label><br>
                                        
                                    </div>
                                </div>
                            <br>

                            <?php
                                }
                                endforeach;
                            ?>



                            <div class="room-card-pic">
                            

                            <div id="slideshow-container-<?php echo $vehicle->VehicleID?>" style="width:100%; " >
                                <?php foreach ($vehicle->vehicle_images_arr as $image_name) { ?>
                                <img src="<?php echo URLROOT; ?>/img/vehicle_images/<?php echo $image_name?>" alt="vehicle image" class="slideshow-image-<?php echo $vehicle->VehicleID?>" style="width:20em;max-height: 15em;  object-fit: contain;">
                                <?php } ?>
                            </div>



                            </div>                    

                            <div class="hotel-ad-card-desc">
                                <article class="taxi_view_v_art" >
                                    <h3><?php echo $vehicle->VehicleType ?></h3>
                                    <!-- <label id="room-type" for="hotel-name"><b><?php echo $vehicle->VehicleType  ?></b></label> <br> -->

                                    <img src="<?php echo URLROOT; ?>/img/Display.png" alt=""><b><p id="taxi_view_v_num"><?php echo $vehicle->vehicle_number  ?></p></b>

                                    <img src="<?php echo URLROOT; ?>/img/Vector.png" alt=""><b><p id="taxi_view_v_vname"><?php echo $vehicle->Model  ?></p></b>

                                    <img src="<?php echo URLROOT; ?>/img/Group.png" alt=""><b><p id="taxi_view_v_maxp"><?php echo $vehicle->no_of_seats  ?> Seats</p></b>

                                    <img src="<?php echo URLROOT; ?>/img/Place Marker.png" alt=""><b><p id="taxi_view_v_loc"><?php echo $vehicle->area  ?></p></b>
                                    <label id="room-price" for="hotel-address"><b><?php echo $vehicle->price_per_km  ?> LKR/KM</b></label><br>
                                </article>
                            </div>

                            <br><br>
                            <button class="taxi_booking_but_new" for="hotel-price" onclick="location.href='<?php echo URLROOT?>/Bookings/TaxiBookingPage/<?php echo $vehicle->VehicleID.'/'.$vehicle->OwnerID?>'"><b>Reserve Now</b></button>

                            </div>

                            <br>
                            </div>
                    
                            
                        </div>

                    <?php
                        endforeach;
                    ?>

                
        </div>
    </div>



    

</div>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>
<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/slideShow/slideshow.js"></script> 
<script src="<?php echo URLROOT;?>/js/components/search/taxiSearch.js"></script>





