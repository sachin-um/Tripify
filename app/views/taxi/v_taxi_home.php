<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>


<div class="wrapper"> 

    <div class="tax-home-content">
        
        <br><br><br>
        <p class="home-title-2" >Where are you going?</p>
        
            <div class="nav-main">
                
                <div class="nav-parts">
                    <p class="hotel-labels-1">Vehicle Type</p>
                    <select class="hotel-labels-1" id="vehicle-type" name="vehicle-type" style="background-color: #D9D9D9;">
                        <option value="all">All Type</option>
                        <option value="Tuk Tuk">Tuk Tuk</option>
                        <option value="Car">Car</option>
                        <option value="Van">Van</option>
                        <option value="Bus">Bus</option>
                    </select>
                </div>

                <div class="nav-parts">
                    <p class="hotel-labels-1">Enter a taxi company</p>
                    <input type="text" placeholder="Search taxis by owner or company name" id="searchInput"
                    style="background-color: #D9D9D9; border: none;">
                </div>             
        
                <div class="nav-parts">
                    <p class="hotel-labels-1">Pick up location</p>
                    <select class="district-labels-1" id="select-district" name="area" style="background-color: #D9D9D9; border: none; font-size: 1rem; text-align: center;">
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
    </div><br>

    <div class="tax-home-content" id="hide-div" style="margin-top: 0;">
            
        <div class="taxi-home-join-network">
            <br>
            <p class="home-title-2" style="margin-bottom: 10px;">Didn't find a ride? Not to worry..<br></p>            
            <p>Send a request to our drivers and let them offer you their best rates!</p><br>

            <div class="home-div-3">
                <button class="all-purpose-btn" type="button" onclick="window.location='<?php echo URLROOT; ?>/Request/addTaxiRequest'"
                style="background-color: #e8b122; color: black;">Request a Ride</button>
            </div>      
            <br>    
        </div>


        <p class="home-title-2" style="margin-top: 3%;">Vehicles Offered by Our Taxi Companies</p>


        <div class="taxi_home_cont">
            <div class="taxi-nav-main" id="vehicle-list" style="margin-top: 0;">
                    
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
                                                <label><b><?php echo $owners->company_name." "?>pvt ltd</b></label><br>
                                                <label><?php echo $owners->address?></label><br>
                                                <p>Click to view company</p>
                                            </div>
                                            <?php 
                                                }
                                            ?>

                                        <!-- <label id="display-hotel-address" for="hotel-address"><?php echo $owners->address?></label><br> -->
                                        
                                    </div>
                                </div>
                            <br>

                            <?php
                                }
                                endforeach;
                            ?>



                            <div class="room-card-pic" style="margin-bottom: 0;">                           

                                <div id="slideshow-container-<?php echo $vehicle->VehicleID?>" style="width:100%; height: 17em; overflow: hidden;" >
                                    <?php foreach ($vehicle->vehicle_images_arr as $image_name) { ?>
                                    <img src="<?php echo URLROOT; ?>/img/vehicle_images/<?php echo $image_name?>" alt="vehicle image" class="slideshow-image-<?php echo $vehicle->VehicleID?>" style="width:100%;  object-fit: contain; height: 200px;">
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

                            <button class="reserve-room" for="hotel-price" onclick="location.href='<?php echo URLROOT?>/Bookings/TaxiBookingPage/<?php echo $vehicle->VehicleID.'/'.$vehicle->OwnerID?>'"><b>Reserve Now</b></button>

                            </div>
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





