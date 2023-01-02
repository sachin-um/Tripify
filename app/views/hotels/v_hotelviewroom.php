<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Hotel') {
    flash('reg_flash', 'Access Denied');
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
            <a href="#" class="menu-item">User Profile</a>
            <a href="<?php echo URLROOT; ?>/HotelRooms/addroom" class="menu-item is-active">Rooms</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard3.php" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard4.php" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard2.php" class="menu-item">Exit Dashboard</a>
            <!-- <br><br><br><br><br><br><br><br><br><p style="text-align: center; font-size: 12px;">© 2022 All Rights Reserved by <br>Tripify(pvt)ltd </p> -->
        </nav>
    </aside>

    <main class="right-side-content">


        <div class="profile">
            <div class="h-title">
                <br><br><br>
                <h1 style="color: black;">Hotel Rooms</h1>
                <br>
            </div>

        <div class="room-cards-row-1">
        <?php
            $rooms=$data['allrooms'];
            foreach($rooms as $room):
        ?>
        <div class="hotel-room-card">        
                <h2 style="text-align: center; background-color: #03002E; color: white;"><br><?php echo $room->RoomType; ?><br></h2>
                <br>
                <ul>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-size-icon.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3><?php echo $room->RoomSize; ?> sqft</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/no of guests.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3><?php echo $room->NoofGuests; ?></h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-money.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3><?php echo $room->PricePerNight; ?></h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-bed.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3><?php echo $room->NoofBeds; ?></h3>
                    </div>
                            
                </div></li>
                </ul>
                <p style="color: darkgreen;text-align: center;">2 Rooms of this type</p>
                <br>
                <div style="text-align: center;">
                    <button class="card-btn" style="width: 80%;">View</button>
                </div>
                
                
        </div>
        
        <?php
            endforeach;
        ?>        
        <br><br>
        
    </div>

    <div style="text-align: center; width: 1700px;">
            <button class="card-btn" style="width: 10%;" onclick="window.location='<?php echo URLROOT; ?>/HotelRooms/addroom'">Add Rooms</button>
    </div>
        
    </div>

</div>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>

<?php
}
?>