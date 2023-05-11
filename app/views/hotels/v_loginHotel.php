<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">
        <br>
        <div class="side-bar"> 
            <br><br>  
            <img src="<?php echo URLROOT?>/img/logo_processed.png">

            <form action="<?php echo URLROOT; ?>/Hotels/login" method="post">
                <br>
                <p style="font-size: 1.1rem;">Email</p>
                <input type="text" class="login-info" id="email" name="email">  
                <span class="invalid"><?php echo $data['email_err']; ?></span>

                <p style="font-size: 1.1rem;">Password</p>
                <input type="password" class="login-info" id="password" name="password">
                <span class="invalid"><?php echo $data['password_err']; ?></span>
                <button class="start-btn" type="submit">Log in</button>
            </form><br>
                <?php flash('reg_flash'); ?>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   






    









    