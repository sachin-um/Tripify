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
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard2.php" class="menu-item">Trip Request</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard3.php" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard4.php" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard2.php" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>hotels/v_hotel_dashboard2.php" class="menu-item">Exit Dashboard</a>
            <br><br><br><br><br><br><br><br><br><p style="text-align: center; font-size: 12px;">© 2022 All Rights Reserved by <br>Tripify(pvt)ltd </p>
        </nav>
    </aside>

    <main class="right-side-content">
        <br><br>
        <h2 style="text-align: left; margin-left:8%;">Profile Information</h1>
        <hr>
        <br>
        <div class="profile-image" style="width: 450px; text-align: center;">
                <br>
                <img id="pro-picture-2" src="<?php echo URLROOT; ?>/img/Group_profile.png" alt="picture">
                <br>
                <br>
                <button class="profile-btn">Edit</button>
            </div>
        
        <div class="first-container">
            <br>
            

            <div class="profile-description">
            <br>
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Name : </h3>
                    </div>
                    
                    <div class="sub-sub">
                        <h3>B.M.L.Wathsan</h3>
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
                        <h3>Password : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>***********</h3>
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
                        <h3>Contact : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>+94 77 123 5687</h3>
                    </div>
                        
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Contact : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>+94 77 973 3456</h3>
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
<!-- <?php require APPROOT.'/views/inc/components/footer.php'; ?> -->




    

