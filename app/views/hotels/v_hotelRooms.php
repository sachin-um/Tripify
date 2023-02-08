<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Hotel') {
    flash('reg_flash', 'Only the Hotel Owners can add Rooms');
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
            <a class="menu-item is-active" href="<?php echo URLROOT; ?>/HotelRooms/rooms" class="menu-item">Rooms</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard3.php" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard4.php" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard2.php" class="menu-item">Exit Dashboard</a>
            <!-- <br><br><br><br><br><br><br><br><br><p style="text-align: center; font-size: 12px;">© 2022 All Rights Reserved by <br>Tripify(pvt)ltd </p> -->
        </nav>
    </aside>

    <main class="right-side-content">
    <div class="h-title">
            <br>
            <br>
            <br>
                <h1>Tell us about your room.</h1>
        </div>
            
        <br>

        <form class="form-div" action="<?php echo URLROOT; ?>/HotelRooms/addroom" method="post">
            <div class='parent'>
                <div class='child'>
                    <label>Room type :</label><br>
                    <select name="roomtype">  
                        <option>Deluxe</option>  
                        <option>Queen Suite</option>  
                        <option>King Suite</option>  
                        <option>Normal Single Room</option>  
                        <option>Normal Double Room</option>  
                    </select>
                </div>
                <div class='child'>
                    <label for="room-size">Room size :</label><br>
                    <input type="text" id="roomsize" name="roomsize"><br>
                </div>
            </div>

            <div class='parent'>
                <div class='child'>
                    <label for="fname">No of guests :</label><br>
                    <input type="text" id="fname" name="no-of-guests"><br>
                </div>
                <div class='child'>
                    <label for="fname">Price per night :</label><br>
                    <input type="text" id="pricepernight" name="pricepernight"><br>
                </div>
            </div>
            
            <div class='parent'>
            <div class='child'>
                    <label for="fname">No of beds :</label><br>
                    <input type="text" id="no-of-beds" name="no-of-beds"><br>
                </div>

                <div class='child'>
                    <label for="fname">No of rooms of this type :</label><br>
                    <input type="text" id="no-of-rooms" name="no-of-rooms"><br>
                </div>
                
            </div>
            <br><br>

            <div class="btn-div-hotel">
                <button style="text-align: center; width : 200px;" class="card-btn" type="submit">Add</button> 
            </div>
              
        </form>
    </div>

</div>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>

<?php
}
?>
