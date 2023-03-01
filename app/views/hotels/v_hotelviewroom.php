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
<?php require APPROOT.'/views/inc/components/sidebars/hotel_sidebar.php'; ?>

<main class="right-side-content">
    <br>
    <p class="home-title-2">Hotel Rooms</p>    

    <div class="room-cards-row-1">
        <?php
            $rooms=$data['allrooms'];
            foreach($rooms as $room):
        ?>

        <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Hotels/showRoomDetails'">
            <div class="hotel-room-card-pic">
                <img id="hotel-img" src="<?php echo URLROOT; ?>/img/Galadari3.jpg" alt="nine-arch">
            </div>                    

            <div class="hotel-ad-card-desc">
                <label id="room-type" for="hotel-name"><b><?php echo $room->RoomType; ?></b></label> <br> <!-- Queen Suite -->
                
                <label id="display-hotel-address" for="hotel-address"><?php echo $room->RoomSize; ?> sqft</label><br>
                <label id="display-hotel-address" for="hotel-address"><?php echo $room->NoofGuests; ?></label><br>
                <label id="room-price" for="hotel-address"><b><?php echo $room->PricePerNight; ?></b></label><br>
                <label id="room-remain" for="hotel-address">4 Rooms of this type</label>
            </div>

                    
            <button class="reserve-room" for="hotel-price"><b>Edit Details</b></button>
                    
        </div>
    
    
        <?php
            endforeach;
        ?>        
        <br><br>
    </div>

    <div class="nav-main">
    <button class="all-purpose-btn" onclick="window.location='<?php echo URLROOT; ?>/HotelRooms/addroom'">Add Rooms</button>
    </div>
        
    

</div>

<?php
}
?>