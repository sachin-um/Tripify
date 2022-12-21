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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item is-active">User Profile</a>
            <!-- <a href="#" class="menu-item">Company</a> -->
            <a href="#" class="menu-item">Drivers</a>
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item">Vehicles</a>
            <a href="#" class="menu-item">Payments</a>
            <a href="#" class="menu-item">Trip Requests</a>
            <a href="#" class="menu-item">Offers</a>
            <a href="#" class="menu-item">Bookings</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

        <main class="right-side-content">
        <br><br>
        <h2 style="text-align: left; margin-left:8%;">Profile Information</h1>
        <hr>
        <div class="first-container">
            <br>
            <div class="profile-image">
                <br>
                <img id="pro-picture" src="<?php echo URLROOT; ?>/img/Grouptax15.png" alt="picture">
            </div>

            <div class="profile-description">
                <br>
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Company Name : </h3>
                    </div>
                    
                    <div class="sub-sub">
                        <h3>ABC Company</h3>
                    </div>
                            
                </div>


                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Address :</h3>
                    </div>
                 
                    <div class="sub-sub">
                        <h3>Hikkaduwa, Sri Lanka</h3>
                    </div>
                    
                </div>
                <br> 

                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Contact : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>+94 77 123 4567</h3>
                    </div>
                        
                </div>
                <br>

                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Registration No: </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>12AB</h3>
                    </div>
                        
                </div>
                <br> 

                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Rating : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>N/A</h3>
                    </div>
                        
                </div>
                <br>
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Price for 1km : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>150 LKR</h3>
                    </div>
                        
                </div>
                <br> 
                 
                <div style="text-align: center;">
                    <button class="profile-btn">Edit Info</button>
                        
                </div>

            </div>
        </div>
        <br>
        <br>
        <h2 style="text-align: left; margin-left:8%;">Settings</h1>
        <hr>
        <br>
        <div class="first-container">
            <div class="profile-image" style="width: 450px; text-align: center;">
                <br>
                <img id="pro-picture-2" src="<?php echo URLROOT; ?>/img/Group_profile.png" alt="picture">
                <br>
                <br>
                <button class="profile-btn">Edit</button>
            </div>

            <div class="profile-description">
            <br>
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Name : </h3>
                    </div>
                    
                    <div class="sub-sub">
                        <h3>P.K. Jayarathne</h3>
                    </div>
                            
                </div>

                <br>

                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Email : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>curran@gmail.com</h3>
                    </div>
                        
                </div>
                <br>

                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Password : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>***********</h3>
                    </div>
                        
                </div>
                <br> 

                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Account ID :</h3>
                    </div>
                 
                    <div class="sub-sub">
                        <h3>A1234</h3>
                    </div>
                    
                </div>
                <br> 
                
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Phone : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>+94 77 123 4567</h3>
                    </div>
                        
                </div>
                <br> 


                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Owner ID : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>12AB</h3>
                    </div>
                        
                </div>
                <br>

                <div style="text-align: center;">
                    <button class="profile-btn">Edit Info</button>
                        
                </div>
            </div>
        </div>
        <br><br>
    </div>

</div>

    </main>
 </div>

<?php
}
?>
