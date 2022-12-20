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
            <br><br><br><br><br><br><br><br><br><p style="text-align: center; font-size: 12px;">© 2022 All Rights Reserved by <br>Tripify(pvt)ltd </p>
        </nav>
    </aside>

    <main class="right-side-content">
    <div class="h-title">
        <br>
        <h3 style="color: green;">The rooms you add to your hotel will appear here.</h3>
        <br>
    </div>

    <div class='parent'>
        <?php
            $rooms=$data['allrooms'];
            foreach($rooms as $room):
        ?>
        <div class='child' style="background-color: lightgrey; height: 370px;">
            <h2>Deluxe Room</h2>
            <!-- <img id="hotel-room" style="width: 75px;" src="<?php echo URLROOT; ?>/img/10910023.png" alt="hotel-room">
            <br> -->

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>Room ID:</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->RoomID; ?></label><br>
                </div>
            </div>

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>RoomType :</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->RoomType; ?></label><br>
                </div>
            </div>

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>RoomSize :</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->RoomSize; ?></label><br>
                </div>
            </div>

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>Price per night(Rs) :</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->PricePerNight; ?></label><br>
                </div>
            </div>

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>NoofGuests :</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->NoofGuests; ?></label><br>
                </div>
            </div>

            <div class="label-one">
                <div class="label-two">
                    <label for="r-size"><b>No of beds :</b></label><br>
                </div>

                <div class="label-three">
                    <label for="r-size-1"><?php echo $room->NoofBeds; ?></label><br>
                </div>
            </div>

            <button class="dash-btn">Edit Info</button>
        </div>
        <?php
            endforeach;
        ?>        
        <br><br>
        <button class="dash-btn" style="width: 30%;" onclick="window.location='<?php echo URLROOT; ?>/HotelRooms/addroom'">Add Room</button>        
    </div>
        
    </div>

</div>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>

<?php
}
?>