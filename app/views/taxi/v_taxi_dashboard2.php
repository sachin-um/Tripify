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
            <a href="<?php echo URLROOT; ?>/Taxies/offers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item">Bookings</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br><br>
    <article >
            
            <h1 id="view_veh_h1">YOUR DRIVERS</h1> 
            
            <div class="taxi_dash_container">
                <?php
                    $alldrivers=$data['drivers'];
                    foreach($alldrivers as $driver):
                ?>
                    <div class="taxi_view_v_dash">
            
                    <img src="<?php echo URLROOT; ?>/img/Group_profile.png" id="taxi_v_c_pic"  alt="Driver image" style="width: 250px;">
            
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
                
                       
                    </article>
                    <button id="taxi_veh_view" onclick="window.location='<?php echo URLROOT; ?>/Taxi_Driver/editdrivers'"  >View</button>
                    <button id="taxi_veh_delete">Delete</button>

                </div>

                <?php
                    endforeach;
                ?>

               
            </div>
                    
            <div  class="taxi-vec-view-contA">  <!-- // THIS DIV CLASS IS FORMAT IN VIEW VEHICLE CSS('taxi_dashboard.css') -->
            <button class="taxi-dash-btn" onclick="window.location='<?php echo URLROOT; ?>/Taxi_Driver/adddriver'">Add Driver</button>
            </div>
            
           
            
        </article>
        
        
    </main>
 </div>