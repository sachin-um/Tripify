<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 
   <div class="home"></div> 
    <h1>This is Home page </h1>

    <?php
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

    ?>
    
<?php require APPROOT.'/views/inc/components/footer.php'; ?>
