<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Guide') {
    flash('reg_flash', 'Only the Guides can add a Offer');
    redirect('Pages/home');
}
else {
    ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">

        <div class="form-login">
            <div >
                <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
                <p id="tag">Make an Offer for Travelers Request</p> 
            </div>
    
            <div >
                <form action="<?php echo URLROOT; ?>/Offers/addGuideOffer/<?php echo $data['requestid'] ?>" method="POST">
                    
                    
                    <label class="abc"> Service charges</label><br>
                    <input type="text" id="charges" name="charges">
                    <span class="invalid"><?php echo $data['charges_err']; ?></span>
                    <label class="abc">Payment option </label><br>
                    <select class="search" id="payment-option" name="payment-option">
                        <option value="" disabled selected hidden>Payment Option</option>
                        <option value="card">Card</option>
                        <option value="cash">Cash</option>
                        <option value="both">Cash Or Card</option>
                    </select>
                    <span class="invalid"><?php echo $data['payment-option_err']; ?></span>
                    <label class="abc"> Additional Information: </label><br>
                    <input type="info" id="info" name="info" placeholder="" >
                    <button id="sign-up-btn-1" type="submit">Make an Offer</button>
                

                </form> 
                <?php flash('reg_flash'); ?>
              
            </div>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   
<?php
}


?>   


<!-- <div class="app">
    <aside class="sidebar">

        <nav class="menu">
            <a href="#" class="menu-item">User Profile</a>
            <a href="#" class="menu-item is-active">Rooms</a>
            <a href="#" class="menu-item">Bookings</a>
            <a href="#" class="menu-item">Payments</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h3 style="text-align: left; margin-left:8%;">The rooms of your hotel appear here.</h3>
        <hr>
        <br>
        <div class="room-cards-row-1">
            <div class="hotel-room-card">        
                <h2 style="text-align: center; background-color: #03002E; color: white;"><br>Single Room<br></h2>
                <br>
                <ul>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-size-icon.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>150 sqft</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/no of guests.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>4 Guests</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-money.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>2500.00</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-bed.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>3 beds</h3>
                    </div>
                            
                </div></li>
                </ul>
                <p style="color: darkgreen;text-align: center;">2 Rooms of this type</p>
                <br>
                <div style="text-align: center;">
                    <button class="card-btn" style="width: 80%;">View</button>
                </div>
                
                
            </div>
            
            <div class="hotel-room-card">        
                <h2 style="text-align: center; background-color: #03002E; color: white;"><br>Double Room<br></h2>
                <br>
                <ul>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-size-icon.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>150 sqft</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/no of guests.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>4 Guests</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-money.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>2500.00</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-bed.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>3 beds</h3>
                    </div>
                            
                </div></li>
                </ul>

                <p style="color: darkgreen;text-align: center;">2 Rooms of this type</p>

                <br>
                <div style="text-align: center;">
                    <button class="card-btn" style="width: 80%;">View</button>
                </div>
            </div>

            <div class="hotel-room-card">        
                <h2 style="text-align: center; background-color: #03002E; color: white;"><br>Deluxe Room<br></h2>
                <br>
                <ul>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-size-icon.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>150 sqft</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/no of guests.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>4 Guests</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-money.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>2500.00</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-bed.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>3 beds</h3>
                    </div>
                            
                </div></li>
                </ul>

                <p style="color: darkgreen;text-align: center;">2 Rooms of this type</p>
                <br>
                <div style="text-align: center;">
                    <button class="card-btn" style="width: 80%;">View</button>
                </div>
                
            </div>

            <div class="hotel-room-card">        
                <h2 style="text-align: center; background-color: #03002E; color: white;"><br>Queen Room<br></h2>
                <br>
                <ul>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-size-icon.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>150 sqft</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/no of guests.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>4 Guests</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-money.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>2500.00</h3>
                    </div>
                            
                </div></li>

                <li><div class="sub-description">
                    <div class="sub-sub" style="width: 40px;">
                        <img class="card-pics" src="<?php echo URLROOT; ?>/img/room-bed.png" alt="picture">
                    </div>
                    
                    <div class="sub-sub">
                        <h3>3 beds</h3>
                    </div>
                            
                </div></li>
                
                </ul>
                <p style="color: darkgreen;text-align: center;">2 Rooms of this type</p>
                <br>
                <div style="text-align: center;">
                    <button class="card-btn">View</button>
                </div>
                
            </div>
            
        </div>
        
        <br><br>
        <div style="text-align: center;">
            <button class="card-btn" style="width: 20%;">Add Room</button>
        </div>
    </main>
 </div>

 <div class='child' style="background-color: lightgrey; height: 370px;">
            <h2>Deluxe Room</h2>
            <img id="hotel-room" style="width: 75px;" src="<?php echo URLROOT; ?>/img/10910023.png" alt="hotel-room">
            <br>

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
        </div> -->