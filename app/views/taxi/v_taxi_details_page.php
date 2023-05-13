<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
else {
    ?>


<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper"> 
    <div class="tax-home-content">
        <div class="hotel-home-top-picks">
            <p class="home-title-2" style="text-transform:uppercase;" ><b><?php echo $data['com_name']." "?>Company</b></p>
            <p style="margin: auto; text-align: center; font-size: 1.1rem;"><?php echo $data['owner']->address?></p>
        </div>
        
        <div class="hotel-desc-page-div">

            <div style="display: flex; flex-direction: column; align-items: center;">
                <img id="" src="<?php echo URLROOT; ?>/img/profileImgs/<?php echo $data['owner']->profileImg?>" alt="picture" style="max-width:100%; max-height:17em; object-fit:contain;">
                <div style="margin-top: 10px; text-align: center;"><p class="home-title-2" style="text-transform:uppercase;" ><b><?php echo $data['owner']->owner_name; ?></b></p></div>
            </div>
            
            <div class="hotel-disc-2">
                <div class="hotel-disc-3" style="text-align:center;">
                    <div class="hotel-disc-1">
                        <ul>
                           <!-- <li><i class="fa-solid fa-person-swimming fa-lg"></i><label></label></li> -->
                           <?php if($data['vehicles'][0]->media){
                            ?>
                            <li><label>Media</label></li>
                            <?php
                           } ?>
                           <?php if($data['vehicles'][0]->wifi){
                            ?>
                            <li><label>Free Wifi</label></li>
                            <?php
                           } ?>
                           <?php if($data['vehicles'][0]->AC){
                            ?>
                             <li><label>Air Conditioning</label></li>
                            <?php
                           } ?>
                              <!-- Default -->
                            <li><label>24/7 Service</label></li>
                        </ul>
                        
                    </div>

                    <div class="hotel-disc-1">
                    <?php
                        $services = $data['owner']->services;
                        $servicesArray = explode(",", $services);

                        foreach ($servicesArray as $service) {
                            echo "<label><b>$service</label><br>";
                        }
                    ?>
                        
                    </div>
                </div>

                <div id="review-btns-div" class="hotel-disc-3">
                    <div class="hotel-disc-1">
                        <button id="review-btn" class="all-purpose-btn">Review This Taxi</button>
                    </div>

                    <div class="hotel-disc-1">
                        <button id="view-review-btn" class="all-purpose-btn">View Reviews</button>
                    </div>                  
                    
                </div>
                <div id="hotel-address" class="hotel-disc-3">
                    <label id="view-address">
                        <?php echo $data['owner']->address?>
                    </label>
                </div>
            </div>        

        </div>
        

        <br><br><br>
        <div class="hotel-home-top-picks">

            <p class="home-title-2" >Our Vehicles</p><br>
            <hr><br><br>
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
                    <p class="hotel-labels-1">Location</p>
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
        </div>

        
    </div>

            
                

    <div class="taxi_dash_container" id="vehicle-list">
                <?php
                    $allvehicles=$data['vehicles'];
                    foreach($allvehicles as $vehicle):
                ?>
                    <div class="taxi_view_v_dash">
                        
                        <div class="taxi_veh_det_cont">
                            <div id="slideshow-container-<?php echo $vehicle->VehicleID?>">
                                <?php foreach ($vehicle->vehicle_images_arr as $image_name) { ?>
                                    <img src="<?php echo URLROOT; ?>/img/vehicle_images/<?php echo $image_name?>" alt="vehicle image" class="slideshow-image-<?php echo $vehicle->VehicleID?>" style="width:20em;max-height: 15em;  object-fit: contain;">
                                <?php } ?>
                            </div>
                        
                            <h3><?php echo $vehicle->vehicle_number?></h3>
                            <article class="taxi_view_v_art" >
                    
                                <img src="<?php echo URLROOT; ?>/img/Vector.png" alt=""><p id="taxi_view_v_vname"><?php echo $vehicle->Model."(".$vehicle->VehicleType.")"  ?></p>
                        
                                <img src="<?php echo URLROOT; ?>/img/Group.png" alt=""><p id="taxi_view_v_maxp"><?php echo $vehicle->no_of_seats  ?> Seats</p>
                        
                                

                                <img src="<?php echo URLROOT; ?>/img/Place Marker.png" alt=""><p id="taxi_view_v_loc"><?php echo $vehicle->area  ?></p>
                                
                                <img src="<?php echo URLROOT; ?>/img/Clock.png" alt=""><p id="taxi_view_v_flag"><?php echo $vehicle->price_per_km  ?> LKR</p>
                                
                                <img src="<?php echo URLROOT; ?>/img/Taxi Driver.png" alt=""><p id="taxi_view_v_num"><?php echo $vehicle->Name  ?></p>

                            </article>
                            <div class="taxi_veh_det_cont" style="text-align: center;">
                                <button class="reserve-room" for="hotel-price" onclick="location.href='<?php echo URLROOT?>/Bookings/TaxiBookingPage/<?php echo $vehicle->VehicleID.'/'.$vehicle->OwnerID?>'"><b>Reserve Now</b></button>

                            </div>
                            
                        </div>
                
                        
                    </div>

                <?php
                    endforeach;
                ?>

               
            </div>


   
</div><br><br><br>

<?php
}
?>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>
<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/slideShow/slideshow.js"></script> 
<!-- <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/slideShow/randomSlideShow.js"></script> -->
<script src="<?php echo URLROOT;?>/js/components/search/taxiSearch.js"></script>
