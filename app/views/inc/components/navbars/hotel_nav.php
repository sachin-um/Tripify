<div class="top">
        <div class="logo-container">
        <a href="<?php echo URLROOT?>/Pages/home"><img id="logo" src="<?php echo URLROOT; ?>/img/output-onlinepngtools.png" alt="logo"></a>
        </div>
        <?php
        if (!empty($_SESSION['user_name'])) {
            ?>
                <div class="welcome-banner">
                    <h2 class="greeting">WELCOME <?php echo $_SESSION['user_name'];  ?>..! </h2>
                    <!-- <button class="logout-btns" type="button" onclick="location.href='<?php echo URLROOT?>/Users/logout'">Log Out</button> -->
                    <img src="<?php echo URLROOT; ?>/img/user-profile1.png" alt="" class="profile-img" onclick="toggleMenu()">
                    <div class="profile-menu-wrap" id="sub-menu">
                        <div class="user-menu">
                            <div class="user-info">
                                <a href="<?php echo URLROOT; ?>/Pages/profile" class="sub-link-menu">
                                    <img src="<?php echo URLROOT; ?>/img/profile.png" alt="">
                                    <h2>View Profile</h2>
                                    <span>></span>
                                </a>
                                <a href="" class="sub-link-menu">
                                    <img src="<?php echo URLROOT; ?>/img/setting.png" alt="">
                                    <h2>Privacy and policy</h2>
                                    <span>></span>
                                </a>
                                <a href="" class="sub-link-menu">
                                    <img src="<?php echo URLROOT; ?>/img/help.png" alt="">
                                    <h2>Help & Support</h2>
                                    <span>></span>
                                </a>
                                <a href="<?php echo URLROOT?>/Users/logout" class="sub-link-menu">
                                    <img src="<?php echo URLROOT; ?>/img/logout.png" alt="">
                                    <h2>Logout</h2>
                                    <span>></span>
                                </a>
                                
                                
                            </div>
                                
                        </div>
                    </div>
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
    <div class="nav-buttons" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
        <button class="nbtns" type="button">Basic Info</button>
    </div>
</div>

 
