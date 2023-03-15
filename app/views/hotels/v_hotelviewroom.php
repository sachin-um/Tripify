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
    <p class="home-title-2">The Rooms You Add To Your Hotel Can Be Viewed Here</p>    

    <div class="nav-grid" style="margin-top: 3%;">
                
        <?php
        
        foreach($data['allroomtypes'] as $roomType):
        ?>

            <!-- <a href="<?php echo URLROOT?>/Hotels/hotelProfile/<?php echo $hotel->HotelID?>" > -->
            <div class="hotel-ad-card">
                    
                <!-- onclick="location.href='<?php echo URLROOT?>/HotelBookings/bookaroom'" -->
                <div id="hotel-img" class="hotel-room-card-pic">
                    <img id="hotel-img" src="<?php echo URLROOT; ?>/img/Galadari3.jpg" alt="nine-arch">
                </div>                    

                <div class="hotel-ad-card-desc">
                    <label id="room-type" for="hotel-name"><h2><?php echo $roomType->RoomTypeName; ?></h2></label>
                    
                    <label id="display-hotel-address" for="hotel-address"><?php echo $roomType->RoomSize." "; ?>Square Feet</label><br>
                    <label id="display-hotel-address" for="hotel-address"><?php echo $roomType->NoofBeds." "; ?>Beds</label><br>
                    <label id="room-price" for="hotel-address"><b><?php echo $roomType->PricePerNight." "; ?>LKR per night</b></label><br>
                    <label id="room-remain" for="hotel-address"><?php echo $roomType->no_of_rooms." "; ?>Bedrooms left</label>
                </div>

                    
                <button class="reserve-room" for="hotel-price"><b>View and Edit</b></button>
                    
            </div>
            <!-- </a> -->
        <?php
        endforeach;
        ?>
    </div>

    <div class="hotel-room-button-part" style="margin-top: 3%; margin-bottom: 5%; text-align: center;">
        <button class="all-purpose-btn" onclick="window.location='<?php echo URLROOT; ?>/HotelRooms/addroom'">Add More Rooms</button>
    </div>
        
    

</div>

<?php
}
?>