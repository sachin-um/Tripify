<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Taxi' || $_SESSION['user_type']!='Admin') {
    ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<div class="app">
    <aside class="sidebar">

        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
            <!-- <a href="#" class="menu-item is-active">Company</a> -->
            <a href="<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers" class="menu-item">Drivers</a>
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item is-active">Vehicles</a>
            <a href="<?php echo URLROOT; ?>/Taxies/payments" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Offers/taxioffers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Pages/taxies" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br><br>
        
        <div>
            <h2 class="title" >Your Vehicles</h2>
            <hr>
        </div>
        <?php flash('vehicle_flash'); ?>
        <article >
            
            <div class="taxi_dash_container">
                
                <?php
                    $allvehicles=$data['vehicles'];
                    foreach($allvehicles as $vehicle):
                ?>
                    <div class="taxi_view_v_dash">
                        
                        <div class="taxi_veh_det_cont">
                        <div id="slideshow-container-<?php echo $vehicle->VehicleID?>">
                            <?php foreach ($vehicle->vehicle_images_arr as $image_name) { ?>
                                <img src="<?php echo URLROOT; ?>/img/vehicle_images/<?php echo $image_name?>" alt="vehicle image" class="slideshow-image-<?php echo $vehicle->VehicleID?>" style="width:15em;max-height: 10em; object-fit: contain;">
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
                        <div>
                            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/edit/<?php echo $vehicle->VehicleID ?>"><button id="taxi_veh_view">View</button></a>
                            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/deleteTaxiVehicle/<?php echo $vehicle->VehicleID ?>"><button id="taxi_veh_delete">Delete</button></a>
                        </div>
                        
                        <div class="admin-action">
                            <?php if ($vehicle->verification_status ==1) {
                                ?><h3>Verified </h3><?php
                            }else {
                                if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                                    ?>
                                    
                                            <hr style="margin-bottom:10px;">
                                            <button class="acc-view-btn" type="button" onclick="showVehicleDetails('<?php echo $vehicle->VehicleID; ?>','<?php echo URLROOT; ?>')">Verification Details</button>
                                            <a href="<?php echo URLROOT; ?>/Users/verifyaccount/<?php echo $data->UserID ?>/Guide">
                                                                    <button class="verify-btn" type="button" style="margin-left:0;">Verify</button>
                                            </a>
                                    
                            <?php
                                }
                                else {
                                    ?><h3>Not Verified</h3><?php
                                }
                            } ?>
                        </div>
                        </div>
                
                        
                    </div>

                <?php
                    endforeach;
                ?>

               
            </div>

            <div class="taxi-vec-view-contA">
            <button class="taxi-dash-btn" onclick="window.location='<?php echo URLROOT; ?>/Taxi_Vehicle/addavehicle'">Add Vehicles</button>
            </div>
            <div id="popup" class="trip-popup">
                <div id="popup-content" class="profile-popup-content"></div>
            </div>
           
            
        </article>
            
    </main>
    <div id="popup" class="trip-popup">
                <div id="popup-content" class="profile-popup-content"></div>
    </div>
      
        
 </div>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/showprofile.js"></script>

<?php
}
else {
    flash('reg_flash', 'Access Denied');
    redirect('Pages/home');
}
?>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>
<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/slideShow/slideshow.js"></script> 

