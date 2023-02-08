<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
    <div class="content">
    <p class="home-title-2">Select your User Role to Login...</p>
    <br><br>     
    <div class="user-btns">
        <button id="btn-1" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Users/login/Service'">
            <span class="button__icon">
                <ion-icon name="bed-outline"></ion-icon>
            </span>
            <span class="button__icon">
                <ion-icon name="car-outline"></ion-icon>
            </span>
            <span class="button__icon">
                <ion-icon name="accessibility-outline"></ion-icon>
            </span>
            <br>
            <span class="button__text">Service Providers</span>
        </button>      
        <br><br>
        <button id="btn-2" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Users/login'">
            <span class="button__icon">
                <ion-icon name="map-outline"></ion-icon>
            </span>
            <br>
            <span class="button__text">Admin</span>
        </button>
    </div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>





    

