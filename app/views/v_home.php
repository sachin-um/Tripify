<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 
   <div class="home"></div>

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
    <div class="home-major">

    <div class="white-space">
        <div class="typed-out">
            <h1 id="title" >Discover popular destinations across Sri Lanka!</h1>
        </div> 

    </div>
    <br>
    <br>

    <div class="horizontal-scroll" style="display:flex; flex-direction: row; justify-content: center; align-items: center">

        <img id="logo" src="<?php echo URLROOT; ?>/img/211689_left_arrow_icon.png" alt="logo">

        <img id="logo" style="height: 200px;width:auto" src="<?php echo URLROOT; ?>/img/25.jpg" alt="logo">
        &nbsp;&nbsp;
        <img id="logo" style="height: 200px;width:auto" src="<?php echo URLROOT; ?>/img/new.jpg" alt="nine-arch">
        &nbsp;&nbsp;
        <img id="logo" style="height: 200px;width:auto" src="<?php echo URLROOT; ?>/img/sigiriya-459197_1920.jpg" alt="sigiriya">
        &nbsp;&nbsp;
        <img id="logo" src="<?php echo URLROOT; ?>/img/211607_right_arrow_icon.png" alt="sigiriya">
    </div>
    <br>
    <hr class="divider">

    <h1 id="title" >Select what you want to search!</h1>

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
</body>
</html>




    
<?php require APPROOT.'/views/inc/components/footer.php'; ?>

    </div>
    