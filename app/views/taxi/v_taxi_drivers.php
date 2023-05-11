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
            <a href="<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers" class="menu-item is-active">Drivers</a>
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item">Vehicles</a>
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
            <h2 class="title" >Your Drivers</h2>
            <hr>
        </div> 
        <article >
            
            
            
            <div class="taxi_dash_container">
                <?php
                    $alldrivers=$data['drivers'];
                    foreach($alldrivers as $driver):
                ?>
                    <div class="taxi_view_v_dash">
                        <div class="taxi_veh_det_cont">
                            <div class="taxi-view-driver-img">
                                <img src="<?php echo URLROOT; ?>/img/driver_profileImgs/<?php echo $driver->profileImg?>" id="profile-img-placehoder"  alt="Driver image" style="width:15em;max-height: 10em; object-fit: contain;" >
                            </div>
                        
                            <article class="taxi_view_v_art" >
                                <div class="tax_dri_art">
                                    <p id="taxi_view_d_p">Name :&ensp; </p><p id="taxi_view_d_p"><?php echo $driver->Name  ?></p>
                                </div>
                                
                                <br>

                                <div class="tax_dri_art">
                                    <p id="taxi_view_d_p">Age :&ensp; </p><p id="taxi_view_d_p"><?php echo $driver->Age  ?></p>
                                </div>

                                <br>

                            <div class="tax_dri_art">
                                    <p id="taxi_view_d_p">License Number :&ensp; </p><p id="taxi_view_d_p"><?php echo $driver->LicenseNo  ?></p>
                            </div>

                            <br>

                            <div class="tax_dri_art">
                                    <p id="taxi_view_d_p">Contact Number :&ensp;+94</p><p id="taxi_view_d_p"><?php echo $driver->contact_number  ?></p>
                            </div>
                        
                            
                            </article>


                            <div >
                                <a href="<?php echo URLROOT; ?>/Taxi_Driver/editdrivers/<?php echo $driver->TaxiDriverID ?>"><button id="taxi_veh_view" >View</button>
                                <a href="<?php echo URLROOT; ?>/Taxi_Driver/deleteTaxiDrivers/<?php echo $driver->TaxiDriverID ?>"><button id="taxi_veh_delete">Delete</button></a>   
                            </div>
                            <br>
                            <div class="admin-action">
                            <?php if ($driver->verification_status ==1) {
                                ?><h3>Verified </h3><?php
                            }else {
                                if ($_SESSION['admin_type']=='verification' || $_SESSION['admin_type']=='Super Admin') {
                                    ?>
                                    
                                            <hr style="margin-bottom:10px;">
                                            <button class="acc-view-btn" type="button" onclick="showDriverDetails('<?php echo $driver->TaxiDriverID; ?>','<?php echo URLROOT; ?>')">Verification Details</button>
                                            <a href="<?php echo URLROOT; ?>/Users/verifyaccount/<?php echo $data->UserID ?>/Guide">
                                                                    <button class="verify-btn" type="button">Verify</button>
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
                    
            <div  class="taxi-vec-view-contA">  <!-- // THIS DIV CLASS IS FORMAT IN VIEW VEHICLE CSS('taxi_dashboard.css') -->
            <button id="taxi_veh_view" onclick="window.location='<?php echo URLROOT; ?>/Taxi_Driver/adddriver'">Add Driver</button>
            </div>
            <div id="popup" class="trip-popup">
                <div id="popup-content" class="profile-popup-content"></div>
            </div>
           
            
        </article>
        
        
    </main>
    <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/showprofile.js"></script>