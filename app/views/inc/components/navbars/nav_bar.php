<div class="top">
        <div>
        <div class="logo-container">
            <img id="logo" src="<?php echo URLROOT; ?>/img/output-onlinepngtools.png" alt="logo">
        </div>
        <?php
        if (!empty($_SESSION['user_name'])) {
            ?>
                <div class="welcome-banner">
                    <h1>Howdy <?php echo $_SESSION['user_name'];  ?>..! </h1>
                    <button class="logout-btns" type="button" onclick="location.href='<?php echo URLROOT?>/Users/logout'">Log Out</button>
                </div>
                
            <?php
        }
        else {
            ?>
            <div class="login-btns">
            <button class="header-btns" type="button" onclick="location.href='<?php echo URLROOT?>/Users/login'">Login</button>&nbsp;
            <button class="header-btns" type="button" onclick="location.href='<?php echo URLROOT?>/Users/register'">Sign Up</button>
            </div>
                <!-- <a href="<?php echo URLROOT?>/Users/register">Register</a>
                <a href="<?php echo URLROOT?>/Users/login">Login</a> -->
            <?php

        }

    ?>
    </div>
    <div class="nav-buttons">
        <button class="nbtns" type="button" >Stays</button>&nbsp;&nbsp;&nbsp;
        <button class="nbtns" type="button" >Taxis</button>&nbsp;&nbsp;&nbsp;
        <button class="nbtns" type="button" >Guides</button>&nbsp;&nbsp;&nbsp;
        <button class="nbtns" type="button" >Attractions</button>&nbsp;&nbsp;&nbsp;
        <button class="nbtns" type="button" >Plan itinerary</button>
    </div>
</div>


