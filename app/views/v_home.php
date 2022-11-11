<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>

<div class="header-space">

</div>

<div class="white-space">
    <br>
    <h2 class="title" >Discover popular destinations across Sri Lanka!</h2>
</div>

<div class="scroll-bar" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <img id="logo" src="<?php echo URLROOT; ?>/img/211689_left_arrow_icon.png" alt="logo">
        
    <img id="logo" style="height: 100px;width:auto" src="<?php echo URLROOT; ?>/img/25.jpg" alt="logo">
    &nbsp;&nbsp;
    <img id="logo" style="height: 200px;width:auto" src="<?php echo URLROOT; ?>/img/new.jpg" alt="nine-arch">
    &nbsp;&nbsp;
    <img id="logo" style="height: 100px;width:auto" src="<?php echo URLROOT; ?>/img/sigiriya-459197_1920.jpg" alt="sigiriya">
    &nbsp;&nbsp;
    <img id="logo" src="<?php echo URLROOT; ?>/img/211607_right_arrow_icon.png" alt="sigiriya">
</div>

<div class="three-dots" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <img id="logo" style="height: 60px;width:auto" src="<?php echo URLROOT; ?>/img/2205199_dot_hide_menu_more_icon" alt="scroll">
</div>

<hr class="divider">
<br>
<h2 class="title">Select what you want to search!</h2>
<br>        
<div class="user-btns" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
    <button id="btn-1" class="btns">
        <span class="button__icon">
            <ion-icon name="bed-outline"></ion-icon>
        </span>
        <br>
        <span class="button__text">Hotel</span>
    </button>&nbsp;&nbsp;&nbsp;&nbsp;
        
    <button id="#2" class="btns">
        <span class="button__icon">
            <ion-icon name="car-outline"></ion-icon>
        </span>
        <br>
        <span class="button__text">Taxi</span>
    </button>&nbsp;&nbsp;&nbsp;&nbsp;        
        
    <button id="#3" class="btns">
        <span class="button__icon">
            <ion-icon name="accessibility-outline"></ion-icon>
        </span>
        <br>
        <span class="button__text">Guide</span>
    </button>&nbsp;&nbsp;&nbsp;&nbsp;
        
    <button id="#4" class="btns">
        <span class="button__icon">
            <ion-icon name="map-outline"></ion-icon>
        </span>
        <br>
        <span class="button__text">Plan a Trip</span>
    </button>
</div>
            
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

    <!-- <?php
    
        if ($data['isLoggedIn']) {
            ?>
                <h1>Welcome <?php echo $_SESSION['user_email'];  ?> </h1>
            <?php
        }
        else {
            ?>
                <a href="<?php echo URLROOT?>/Users/register">Register</a>
                <a href="<?php echo URLROOT?>/Users/login">Login</a>
            <?php

        }

    ?> -->



    

