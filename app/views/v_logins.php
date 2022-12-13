<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
    <div class="content">
    <br>
    <h2 class="logins-title">Select your User Role to Login...</h2>
    <br>        
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
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>





    

