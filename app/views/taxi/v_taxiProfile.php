<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/nav_bar.php'; ?>

<?php
$_SESSION['user_id'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Taxi') {
    flash('reg_flash', 'Only the Taxi Owners can  view their Vehicles');
    redirect('Users/login');
}
else {
    ?>

<article >
<h1 id="view_veh_h1">Your Vehicle</h1> 
        <div class="taxi_dash_container">
        <?php
            $allvehicles=$data['vehicles'];
            foreach($allvehicles as $vehicle):
        ?>
            <div class="taxi_view_v_dash">
           
           <img src="<?php echo URLROOT; ?>/img/Grouptax15.png" id="taxi_v_c_pic"  alt="Driver image">
          
           <article class="taxi_view_v_art" >
          
               <img src="<?php echo URLROOT; ?>/img/Vector.png" alt=""><p id="taxi_view_v_vname"><?php echo $vehicle->Model  ?> Wagon</p>
               
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
        
        

    </article>

    <button class="dash-btn" onclick="window.location='<?php echo URLROOT; ?>/Taxi_Vehicle/addavehicle'">Add More Vehicle</button>
<?php require APPROOT.'/views/inc/components/navbars/taxi-dashboard.php'; ?>
<?php
}

?>