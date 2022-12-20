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
            <a href="#" class="menu-item is-active">User Profile</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard2.php" class="menu-item">Rooms</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard3.php" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard4.php" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard2.php" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <h2 style="text-align: left; margin-left:8%;">Profile Information</h1>
        <hr>
        <div class="profile-image">
            <br><br>
            <img id="pro-picture" src="<?php echo URLROOT; ?>/img/istockphoto-104731717-612x612.jpg" alt="picture">

            <div class="profile-description">
            <br>
            <br>
            <div class="flex-2">
                <div class="profile-tags">
                    <h4>Property Name : </h4>
                </div>
                   
                <div class="profile-tags">
                    <h4>Blue Mountain Hotel</h4>
                </div>
                        
            </div>
            <br> 
            <div class="flex-2">
                <div class="profile-tags">
                    <h4>Address :</h4>
                </div>
                 
                <div class="profile-tags">
                    <h4>Hikkaduwa, Sri Lanka</h4>
                </div>
                    
            </div>
            <br> 
            <div class="flex-2">
                <div class="profile-tags">
                    <h4>Rating : </h4>
                </div>
                    
                <div class="profile-tags">
                    <h4>4.8</h4>
                </div>
                    
            </div>
            <br> 
            <div class="flex-2">
                <div class="profile-tags">
                    <h4>Contact : </h4>
                </div>
                    
                <div class="profile-tags">
                    <h4>+94 77 123 4567</h4>
                </div>
                    
            </div>

            <br> 
            <div class="flex-2">
                <div class="profile-tags">
                    <h4>Registration No : </h4>
                </div>
                    
                <div class="profile-tags">
                    <h4>R45671</h4>
                </div>
        </div>
<<<<<<< HEAD:app/views/hotels/v_hotel-dashboard.php
        </div> 
    </main>
 </div>
=======

        <div>
            <div class="profile-tags">
                <button class="profile-btn">Edit Info</button>
            </div>
                    
            <div class="profile-tags">
                <button class="profile-btn">Rooms</button>
            </div>
        </div>
        
    </div>

</div>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>




    

>>>>>>> main:app/views/hotels/v_hotelProfile.php
