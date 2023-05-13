<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Admin') {
    flash('reg_flash', 'Only the Traveler can have access...');
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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">Admin Profile</a>
            <a href="app/views/traveler/traveler_dashboard2.php" class="menu-item">Messages</a>
            <a href="#" class="menu-item">Complains</a>
            <a href="<?php echo URLROOT; ?>/Trips/trips" class="menu-item">Articles</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item is-active">User Profiles</a>
            <a href="<?php echo URLROOT; ?>/Pages/home/" class="menu-item" >Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 style="text-align: left; margin-left:8%;">User Profiles</h1>
        <hr>
        <br>
        <div class="first-container">
            <div class="user-btns" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
                <button id="btn-1" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Hotels/login'">
                    <span class="button__icon">
                        <ion-icon name="bed-outline"></ion-icon>
                    </span>
                    <br>
                    <span class="button__text">Hotel</span>
                </button>&nbsp;&nbsp;&nbsp;&nbsp;
        
                <button id="#2" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Taxies/login'">
                    <span class="button__icon">
                        <ion-icon name="car-outline"></ion-icon>
                    </span>
                    <br>
                    <span class="button__text">Taxi</span>
                </button>&nbsp;&nbsp;&nbsp;&nbsp;        
        
                <button id="#3" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Guides/login'">
                    <span class="button__icon">
                        <ion-icon name="accessibility-outline"></ion-icon>
                    </span>
                    <br>
                    <span class="button__text">Guide</span>
                </button>&nbsp;&nbsp;&nbsp;&nbsp;                                   
        
                <button id="#4" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Admins/login'">
                    <span class="button__icon">
                        <ion-icon name="map-outline"></ion-icon>
                    </span>
                    <br>
                    <span class="button__text">Admin</span>
                </button>
            </div>
            
        </div>
    </main>
 </div>

 <?php
}
?>