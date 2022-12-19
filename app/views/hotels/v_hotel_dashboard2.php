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
            <a href="#" class="menu-item is-active">Rooms</a>
            <a href="#" class="menu-item">Bookings</a>
            <a href="#" class="menu-item">Payments</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
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
        </div> 
    </main>
 </div>