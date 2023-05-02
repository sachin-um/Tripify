<div class="top">
    <div class="system-nav-main">
        <div class="nav-logo-container">
            <a href="<?php echo URLROOT ?>/Pages/home"><img id="logo" src="<?php echo URLROOT; ?>/img/logo.png" alt="logo"></a>
        </div>

        <div class="nav-text-links">

            <div class="nav-parts">
                <a href="<?php echo URLROOT ?>/Pages/hotels" id="nav-btns">Hotels</a>
            </div>

            <div class="nav-parts">
                <a href="<?php echo URLROOT ?>/Pages/taxies" id="nav-btns">Taxis</a>
            </div>

            <div class="nav-parts">
                <a href="<?php echo URLROOT ?>/Pages/guides" id="nav-btns">Guides</a>
            </div>

            <div class="nav-parts">
                <a href="<?php echo URLROOT ?>/Pages/home" id="nav-btns">About</a>
            </div>

        </div>


        <?php
        if (!empty($_SESSION['user_name'])) {

        ?>
            <div class="welcome-banner" style="padding:10px 0">
                
                    <!-- <h2 class="greeting">Hi, <?php echo $_SESSION['user_name'];  ?>..! </h2> -->
                    <!-- <button class="logout-btns" type="button" onclick="location.href='<?php echo URLROOT?>/Users/logout'">Log Out</button> -->
                    <!-- <img src="<?php echo URLROOT; ?>/img/profileImgs/<?php echo  $_SESSION['user_profile_image']; ?>" alt="" class="profile-img" onclick="toggleMenu()"> -->
                    <i class="fa-solid fa-bars fa-xl" onclick="toggleMenu()"></i>
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
            </div>

        <?php
        } else {
        ?>

            <div class="auth-banner">
           
                    <button class="nav-btns" onclick="location.href='<?php echo URLROOT ?>/Users/login'">Login</button>
             
                
                    <button class="nav-btns" onclick="location.href='<?php echo URLROOT ?>/Users/register'">Sign Up</button>
      
            </div>
            <!-- <div class="login-btns">
            <button class="header-btns" type="button" onclick="location.href='<?php echo URLROOT ?>/Users/login'">Login</button>&nbsp;
            <button class="header-btns" type="button" onclick="location.href='<?php echo URLROOT ?>/Users/register'">Sign Up</button>
            </div> -->
            <!-- <a href="<?php echo URLROOT ?>/Users/register">Register</a>
                <a href="<?php echo URLROOT ?>/Users/login">Login</a> -->
        <?php

        }

        ?>






    </div>
</div>


<script>
    let subMenu=document.getElementById("sub-menu");

    function toggleMenu() {
        subMenu.classList.toggle("open-menu");
    }
</script>

