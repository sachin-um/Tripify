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
<?php require APPROOT.'/views/inc/components/sidebars/hotel_sidebar.php'; ?>

    

<main class="right-side-content">
    <p class="home-title-2" style="margin-top: 3%;">Enter room details here</p> 
    
    <div class="hotel-profile-modified">
            

        <div class="sub-profile-div">
            <img id="profile-img-placehoder" src="<?php echo URLROOT; ?>/img/date.png" alt="picture">
        </div>

        <div class="sub-profile-div">

            <form action="<?php echo URLROOT; ?>/HotelRooms/addroom" method="post">
                <div class="profile-grid">
                    <div class="profile-left">
                        <label>Room type :</label>
                    </div>
                    <div class="profile-right">
                        <select name="roomtype">
                            <option>Deluxe</option>
                            <option>Queen Suite</option>
                            <option>King Suite</option>
                            <option>Normal Single Room</option>
                            <option>Normal Double Room</option>
                        </select>
                    </div>
                </div>
            </form>
            

                <div class="profile-grid">
                    <div class="profile-left">
                        Property Name : 
                    </div>
                    <div class="profile-right">
                        <?php echo $data['hoteldetails']->Name; ?>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-left">
                        Property Catagory : 
                    </div>
                    <div class="profile-right">
                        <?php echo $data['hoteldetails']->Name; ?>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-left">
                        Email : 
                    </div>
                    <div class="profile-right">
                        <?php echo $data['hoteldetails']->Name; ?>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-left">
                        Verification Status : 
                    </div>
                    <div class="profile-right">
                        <?php echo $data['hoteldetails']->Name; ?>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-left">
                        Account Status :
                    </div>
                    <div class="profile-right">
                        <?php echo $data['hoteldetails']->Name; ?>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-left">
                        Address : 
                    </div>
                    <div class="profile-right">
                        <?php echo $data['hoteldetails']->Name; ?>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-left">
                        Contact :
                    </div>
                    <div class="profile-right">
                        <?php echo $data['hoteldetails']->Name; ?>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-left">
                        Check In :
                    </div>
                    <div class="profile-right">
                        <?php echo $data['hoteldetails']->Name; ?>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-left">
                        Check Out :
                    </div>
                    <div class="profile-right">
                        <?php echo $data['hoteldetails']->Name; ?>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-left">
                        Cancelation Period :
                    </div>
                    <div class="profile-right">
                        <?php echo $data['hoteldetails']->Name; ?>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-left">
                        Cancelation Fee :
                    </div>
                    <div class="profile-right">
                        <?php echo $data['hoteldetails']->Name; ?>
                    </div>
                </div>
            </div>

            

    <!-- <form class="form-div" action="<?php echo URLROOT; ?>/HotelRooms/addroom" method="post">
        <div class='parent'>
            <div class='child'>
                
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
            
    </form> -->
</div>



<?php
}
?>
