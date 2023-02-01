<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Taxi') {
    flash('reg_flash', 'Only the Taxi Owners can have access...');
    redirect('Pages/home');
}
else {
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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item ">User Profile</a>
            <!-- <a href="#" class="menu-item">Company</a> -->
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item">Drivers</a>
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item is-active">Vehicles</a>
            <a href="#" class="menu-item">Payments</a>
            <a href="#" class="menu-item">Trip Requests</a>
            <a href="#" class="menu-item">Offers</a>
            <a href="#" class="menu-item">Bookings</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

        <main class="right-side-content">
        <br><br>
        <article >
            <h1 id="view_veh_h1">Your Vehicle</h1> 
            <div class="taxi_dash_container">
            <?php
                $allvehicles=$data['vehicles'];
                foreach($allvehicles as $vehicle):
            ?>
                <div class="taxi_view_v_dash">
           
                <img src="<?php echo URLROOT; ?>/img/car.png" id="taxi_v_c_pic"  alt="Driver image" style="width: 250px;">
          
                <article class="taxi_view_v_art" >
          
                    <img src="<?php echo URLROOT; ?>/img/Vector.png" alt=""><p id="taxi_view_v_vname"><?php echo $vehicle->Model  ?></p>
               
                    <img src="<?php echo URLROOT; ?>/img/Group.png" alt=""><p id="taxi_view_v_maxp"><?php echo $vehicle->no_of_seats  ?> Seats</p>
               
                    <img src="<?php echo URLROOT; ?>/img/Display.png" alt=""><p id="taxi_view_v_num"><?php echo $vehicle->vehicle_number  ?></p>
               
                    <img src="<?php echo URLROOT; ?>/img/Place Marker.png" alt=""><p id="taxi_view_v_loc"><?php echo $vehicle->area  ?></p>
               
                    <img src="<?php echo URLROOT; ?>/img/Clock.png" alt=""><p id="taxi_view_v_flag"><?php echo $vehicle->price_per_km  ?> LKR</p>
           
                </article>
                <button id="taxi_veh_view">View</button>
                <button id="taxi_veh_delete">Delete</button>

                </div>
            <?php
                endforeach;
            ?>
            
            </div>
            <button class="taxi-dash-btn" onclick="window.location='<?php echo URLROOT; ?>/Taxi_Vehicle/addavehicle'">Add Vehicles</button>
        </article>
        
    
    
        </main>
 </div>

<?php
}
?>